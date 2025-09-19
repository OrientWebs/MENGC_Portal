<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\PErepository;

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
    public function create($baseData = null, $peData)
    {
        dd($peData);
        $user = auth()->user()->id;
        $baseData += [
            'status' => 'approved',
        ];
        if ($baseData['nationality_type'] === 'NRC') {
            $baseData += [
                'nrc_no_en' => format_nrc($baseData, 'en'),
                'nrc_no_mm' => format_nrc($baseData, 'mm'),
            ];
        }
        $BaseData = $this->PErepository->createRegistratonForm($baseData);
    }
}
