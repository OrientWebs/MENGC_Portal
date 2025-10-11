<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\PeRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PeService
{
    private PeRepository $PeRepository;
    public function __construct(PeRepository $PeRepository)
    {
        $this->PeRepository = $PeRepository;
    }

    public function getAllNrcState()
    {
        return $this->PeRepository->getNrcState()->get();
    }

    public function findRegistrationForm($id)
    {
        return $this->PeRepository->registrationForm()->find($id);
    }
    public function findPeRegistrationForm($id)
    {
        return $this->PeRepository->peRegistrationForm()->with('registrationForm', 'PeAcademicQualifications')->find($id);
    }
    public function findPeAcademicQualifications($id)
    {
        return $this->PeRepository->PEAcademicQualifications()->find($id);
    }
    public function getNrcTownship($stateId)
    {
        return $this->PeRepository->getNrcTwonship()->where('state_id', $stateId)->get();
    }
    public function getNrcType()
    {
        return $this->PeRepository->getNrcType()->get();
    }
    public function generateRegisterNo()
    {
        return $this->PeRepository->generateRegisterNo();
    }
    public function states()
    {
        return $this->PeRepository->getStates()->get();
    }
    public function getTownships($state_id)
    {
        return $this->PeRepository->township()->where('state_id', $state_id)->get();
    }
    public function engineeringDisciplines()
    {
        return $this->PeRepository->getEngineeringDiscipline()->get();
    }
    public function getUniversity()
    {
        return $this->PeRepository->university()->get();
    }
    public function getAcademicQualification()
    {
        return $this->PeRepository->academicQualification()->get();
    }

    // App\Services\PeService.php
    public function create($baseData, $peData, $peAcademicQualifications = null)
    {
        $user = auth()->user()->id;
        $baseData += [
            'status' => 'approved',
            'user_id' => $user
        ];
        if ($baseData['nationality_type'] === 'NRC') {
            $baseData += [
                'nrc_no_en' => format_nrc($baseData, 'en'),
                'nrc_no_mm' => format_nrc($baseData, 'mm'),
            ];
        }
        DB::beginTransaction();
        try {
            $registrationForm = $this->PeRepository->registrationForm()->create($baseData);
            $peData["registration_id"] = $registrationForm->id;
            $PeRegistrationForm = $this->PeRepository->peRegistrationForm()->create($peData);
            $pe_form_id  = $PeRegistrationForm->id;
            if (!empty($pe_form_id) && !empty($peAcademicQualifications)) {
                $peAcademicQualifications += [
                    'pe_form_id' => $pe_form_id
                ];
                $peAcademicQualifications = $this->PeRepository->PEAcademicQualifications()->create($peAcademicQualifications);
            }
            if ($baseData['nrc_card_front']) {
                $registrationForm->addMedia($baseData['nrc_card_front']->getRealPath())->usingFileName($baseData['nrc_card_front']->getClientOriginalName())->toMediaCollection('nrc_photo_front');
            }

            if ($baseData['nrc_card_back']) {
                $registrationForm->addMedia($baseData['nrc_card_back']->getRealPath())->usingFileName($baseData['nrc_card_back']->getClientOriginalName())->toMediaCollection('nrc_photo_back');
            }
            if ($baseData['profile_photo']) {
                $registrationForm->addMedia($baseData['profile_photo']->getRealPath())->usingFileName($baseData['profile_photo']->getClientOriginalName())->toMediaCollection('profile_photo');
            }
            if ($peData['professional_experience_pdf']) {
                $PeRegistrationForm->addMedia($peData['professional_experience_pdf']->getRealPath())->usingFileName($peData['professional_experience_pdf']->getClientOriginalName())->toMediaCollection('professional_experience_pdf');
            }
            if ($peData['discipline_involvement_pdf']) {
                $PeRegistrationForm->addMedia($peData['discipline_involvement_pdf']->getRealPath())->usingFileName($peData['discipline_involvement_pdf']->getClientOriginalName())->toMediaCollection('discipline_involvement_pdf');
            }
            if ($peData['significant_engineering_work_pdf']) {
                $PeRegistrationForm->addMedia($peData['significant_engineering_work_pdf']->getRealPath())->usingFileName($peData['significant_engineering_work_pdf']->getClientOriginalName())->toMediaCollection('significant_engineering_work_pdf');
            }
            if ($peData['verification_engineers_pdf']) {
                $PeRegistrationForm->addMedia($peData['verification_engineers_pdf']->getRealPath())->usingFileName($peData['verification_engineers_pdf']->getClientOriginalName())->toMediaCollection('verification_engineers_pdf');
            }

            DB::commit();
            return $registrationForm;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating record: ' . $e->getMessage());
            throw $e;
        }
    }

    public function update($id, $baseData, $peData, $peAcademicValidated = null, $frontFile = null, $backFile = null, $profilePhoto = null)
    {

        $peRegistrationData = $this->findPeRegistrationForm($id);
        $registrationForm   = $this->findRegistrationForm($peRegistrationData->registration_id);
        if ($peAcademicValidated) {
            $peAcademic = $this->findPeAcademicQualifications($peAcademicValidated['pe_academic_qualifications_id']);
        }

        if ($baseData['nationality_type'] === 'NRC') {
            $baseData += [
                'nrc_no_en' => format_nrc($baseData, 'en'),
                'nrc_no_mm' => format_nrc($baseData, 'mm'),
            ];
        }
        DB::beginTransaction();
        try {
            $registrationForm->update($baseData);
            $peRegistrationData->update($peData);
            $peAcademic->update($peAcademicValidated);

            if ($frontFile) {
                $registrationForm->clearMediaCollection('nrc_photo_front');
                $registrationForm->addMedia($frontFile->getRealPath())->usingFileName($frontFile->getClientOriginalName())->toMediaCollection('nrc_photo_front');
            } elseif (!empty($baseData['existing_nrc_card_front'])) {
            } else {
                $registrationForm->clearMediaCollection('nrc_photo_front');
            }

            // Handle NRC back photo
            if ($backFile) {
                $registrationForm->clearMediaCollection('nrc_photo_back');
                $registrationForm->addMedia($backFile->getRealPath())->usingFileName($backFile->getClientOriginalName())->toMediaCollection('nrc_photo_back');
            } elseif (!empty($baseData['existing_nrc_card_back'])) {
            } else {
                $registrationForm->clearMediaCollection('nrc_photo_back');
            }

            // Handle NRC back photo
            if ($profilePhoto) {
                $registrationForm->clearMediaCollection('profile_photo');
                $registrationForm->addMedia($profilePhoto->getRealPath())->usingFileName($profilePhoto->getClientOriginalName())->toMediaCollection('profile_photo');
            } elseif (!empty($baseData['existing_profile_photo'])) {
            } else {
                $registrationForm->clearMediaCollection('profile_photo');
            }

            if ($peRegistrationData->getFirstMediaUrl('professional_experience_pdf') != $peData['professional_experience_pdf'] && !empty($peData['professional_experience_pdf'])) {
                $peRegistrationData->clearMediaCollection('professional_experience_pdf');
                $peRegistrationData->addMedia($peData['professional_experience_pdf']->getRealPath())->usingFileName($peData['professional_experience_pdf']->getClientOriginalName())->toMediaCollection('professional_experience_pdf');
            }

            if ($peRegistrationData->getFirstMediaUrl('discipline_involvement_pdf') != $peData['discipline_involvement_pdf'] && !empty($peData['discipline_involvement_pdf'])) {
                $peRegistrationData->clearMediaCollection('discipline_involvement_pdf');
                $peRegistrationData->addMedia($peData['discipline_involvement_pdf']->getRealPath())->usingFileName($peData['discipline_involvement_pdf']->getClientOriginalName())->toMediaCollection('discipline_involvement_pdf');
            }

            if ($peRegistrationData->getFirstMediaUrl('significant_engineering_work_pdf') != $peData['significant_engineering_work_pdf'] && !empty($peData['significant_engineering_work_pdf'])) {
                $peRegistrationData->clearMediaCollection('significant_engineering_work_pdf');
                $peRegistrationData->addMedia($peData['significant_engineering_work_pdf']->getRealPath())->usingFileName($peData['significant_engineering_work_pdf']->getClientOriginalName())->toMediaCollection('significant_engineering_work_pdf');
            }
            if ($peRegistrationData->getFirstMediaUrl('verification_engineers_pdf') != $peData['verification_engineers_pdf'] && !empty($peData['verification_engineers_pdf'])) {
                $peRegistrationData->clearMediaCollection('verification_engineers_pdf');
                $peRegistrationData->addMedia($peData['verification_engineers_pdf']->getRealPath())->usingFileName($peData['verification_engineers_pdf']->getClientOriginalName())->toMediaCollection('verification_engineers_pdf');
            }

            DB::commit();
            return $registrationForm;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating record: ' . $e->getMessage());
            throw $e;
        }
    }


    public function index($prePage = null, $search = null)
    {
        $roles = auth()->user()->getRoleNames()->first();
        $user_id = auth()->user()->id;
        $query = $this->PeRepository->peRegistrationForm()->query();
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('perm_address_en', 'like', "%{$search}%");

                $q->orWhereHas('registrationForm', function ($qr) use ($search) {
                    $qr->where('register_no', 'like', "%{$search}%");
                    $qr->orWhere('name_en', 'like', "%{$search}%");
                    $qr->orWhere('name_mm', 'like', "%{$search}%");
                    $qr->orWhere('nrc_no_en', 'like', "%{$search}%");
                    $qr->orWhere('permanent_resident_no', 'like', "%{$search}%");
                });
            });
        }

        if ($roles === "User") {
            $query->whereHas('registrationForm', function ($q) use ($user_id) {
                $q->where('user_id', $user_id);
            });
        }
        return $query->with("registrationForm.user")->paginate($prePage);
    }

    public function deleteRegistrationForm($id)
    {
        DB::beginTransaction();
        try {
            $peRegistrationForm = $this->findPeRegistrationForm($id);
            $registration_id = $peRegistrationForm->registration_id;
            $registrationForm = $this->findRegistrationForm($registration_id);
            $peRegistrationForm->delete();
            $registrationForm->delete();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating record: ' . $e->getMessage());
            throw $e;
        }
        DB::commit();
    }
}
