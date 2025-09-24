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
    public function __create($baseData, $peData)
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
            $registrationFormId = $registrationForm->id;
            $peData["registration_id"] = $registrationFormId;
            $PeRegistrationForm = $this->PErepository->peRegistrationForm()->create($peData);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating record: ' . $e->getMessage());
            throw $e;
        }
        DB::commit();
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
            $this->PErepository->peRegistrationForm()->create($peData);
            DB::commit();
            return $registrationForm;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating record: ' . $e->getMessage());
            throw $e;
        }
    }


    public function update($id, $baseData, $peData)
    {
        $peRegistrationData = $this->findPeRegistrationForm($id);
        $registraationForm = $this->findRegistrationForm($peRegistrationData->registration_id);
        if ($baseData['nationality_type'] === 'NRC') {
            $baseData += [
                'nrc_no_en' => format_nrc($baseData, 'en'),
                'nrc_no_mm' => format_nrc($baseData, 'mm'),
            ];
        }

        DB::beginTransaction();
        try {
            $registraationForm = $registraationForm->update($baseData);
            $peRegistrationForm = $peRegistrationData->update($peData);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating record: ' . $e->getMessage());
            throw $e;
        }
        DB::commit();
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