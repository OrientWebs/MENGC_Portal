<?php

namespace App\Repositories;

use App\Models\State;
use App\Models\NrcType;
use App\Models\NrcState;
use App\Models\Township;
use App\Models\University;
use App\Models\NrcTownship;
use App\Models\RegistrationForm;
use App\Models\PERegistrationForm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\AcademicQualification;
use App\Models\EngineeringDiscipline;
use App\Utilities\BaseCrudRepository;
use App\Models\PEAcademicQualifications;

class PErepository extends BaseCrudRepository
{
    public $RegistrationForm;
    private $NrcState;
    private $NrcTownship;
    private $NrcType;
    private $State;
    private $Township;
    private $EngineeringDiscipline;
    private $PeRegistrationForm;
    private $University;
    private $AcademicQualification;
    private $PEAcademicQualifications;
    public function __construct(
        PERegistrationForm $model,
        RegistrationForm $registrationForm,
        NrcState $NrcState,
        NrcTownship $NrcTownship,
        NrcType $NrcType,
        Township $Township,
        State $State,
        EngineeringDiscipline $engineeringDiscipline,
        University $University,
        AcademicQualification $academicQualification,
        PEAcademicQualifications $PEAcademicQualifications
    ) {
        parent::__construct($model);
        $this->PeRegistrationForm = $model;
        $this->RegistrationForm = $registrationForm;
        $this->NrcState = $NrcState;
        $this->NrcTownship = $NrcTownship;
        $this->NrcType  = $NrcType;
        $this->Township = $Township;
        $this->State = $State;
        $this->EngineeringDiscipline = $engineeringDiscipline;
        $this->University = $University;
        $this->AcademicQualification = $academicQualification;
        $this->PEAcademicQualifications = $PEAcademicQualifications;
    }
    public function peRegistrationForm()
    {
        return $this->PeRegistrationForm;
    }
    public function getNrcState()
    {
        return $this->NrcState;
    }
    public function getEngineeringDiscipline()
    {
        return $this->EngineeringDiscipline;
    }

    public function PEAcademicQualifications()
    {
        return $this->PEAcademicQualifications;
    }
    public function getNrcTwonship()
    {
        return $this->NrcTownship;
    }
    public function getNrcType()
    {
        return $this->NrcType;
    }
    public function registrationForm()
    {
        return $this->RegistrationForm;
    }
    public function getStates()
    {
        return $this->State;
    }
    public function Township()
    {
        return $this->Township;
    }
    public function AcademicQualification()
    {
        return $this->AcademicQualification;
    }
    public function University()
    {
        return $this->University;
    }
    public function generateRegisterNo()
    {
        $id = $this->id ?? 0;
        $micro = (int)(microtime(true) * 1000000);
        $rand = random_int(100, 999);

        $number = substr($id . $micro . $rand, -6);

        return 'PE:' . str_pad($number, 6, '0', STR_PAD_LEFT);
    }
}