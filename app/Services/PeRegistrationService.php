<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\PErepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PeRegistrationService
{
    private PErepository $PErepository;
    public function __construct(PErepository $PERepository)
    {
        $this->PErepository = $PERepository;
    }

    public function getAllNrcState()
    {
        return $this->PErepository->getNrcState()->get();
    }

    public function findRegistrationForm($id)
    {
        return $this->PErepository->registrationForm()->find($id);
    }
    public function findPeRegistrationForm($id)
    {
        return $this->PErepository->peRegistrationForm()->with('registrationForm')->find($id);
    }
    public function getNrcTownship($stateId)
    {
        return $this->PErepository->getNrcTwonship()->where('state_id', $stateId)->get();
    }
    public function getNrcType()
    {
        return $this->PErepository->getNrcType()->get();
    }
    public function generateRegisterNo()
    {
        return $this->PErepository->generateRegisterNo();
    }
    public function states()
    {
        return $this->PErepository->getStates()->get();
    }
    public function getTownships($state_id)
    {
        return $this->PErepository->township()->where('state_id', $state_id)->get();
    }
    public function engineeringDisciplines()
    {
        return $this->PErepository->getEngineeringDiscipline()->get();
    }

    // App\Services\PeRegistrationService.php
    public function create($baseData, $peData)
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
            $registrationForm = $this->PErepository->registrationForm()->create($baseData);
            $peData["registration_id"] = $registrationForm->id;
            $PeRegistrationForm = $this->PErepository->peRegistrationForm()->create($peData);
            DB::commit();
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
            return $registrationForm;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating record: ' . $e->getMessage());
            throw $e;
        }
    }


    // PEservice.php
    public function __update($id, $baseData, $peData, $frontFile = null, $backFile = null)
    {

        $peRegistrationData = $this->findPeRegistrationForm($id);
        $registrationForm   = $this->findRegistrationForm($peRegistrationData->registration_id);

        if ($baseData['nationality_type'] === 'NRC') {
            $baseData += [
                'nrc_no_en' => format_nrc($baseData, 'en'),
                'nrc_no_mm' => format_nrc($baseData, 'mm'),
            ];
        }

        dd($baseData);
        DB::beginTransaction();
        try {
            $registrationForm->update($baseData);
            $peRegistrationData->update($peData);

            // ✅ handle media here
            // if ($frontFile) {
            //     $registrationForm->clearMediaCollection('nrc_photo_front');
            //     $registrationForm->addMedia($frontFile->getRealPath())
            //         ->usingFileName($frontFile->getClientOriginalName())
            //         ->toMediaCollection('nrc_photo_front');
            // }

            // if ($backFile) {
            //     $registrationForm->clearMediaCollection('nrc_photo_back');
            //     $registrationForm->addMedia($backFile->getRealPath())
            //         ->usingFileName($backFile->getClientOriginalName())
            //         ->toMediaCollection('nrc_photo_back');
            // }

            DB::commit();
            return $registrationForm; // return model to component
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating record: ' . $e->getMessage());
            throw $e;
        }
    }

    public function update($id, $baseData, $peData, $frontFile = null, $backFile = null, $profilePhoto = null)
    {
        $peRegistrationData = $this->findPeRegistrationForm($id);
        $registrationForm   = $this->findRegistrationForm($peRegistrationData->registration_id);

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
        $query = $this->PErepository->peRegistrationForm()->query();
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