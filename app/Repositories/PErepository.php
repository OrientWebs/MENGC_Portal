<?php

namespace App\Repositories;

use App\Models\EngineeringDiscipline;
use App\Models\NrcState;
use App\Models\NrcTownship;
use App\Models\NrcType;
use App\Models\PERegistrationForm;
use App\Models\RegistrationForm;
use App\Models\State;
use App\Models\Township;
use App\Utilities\BaseCrudRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
    public function __construct(PERegistrationForm $model, RegistrationForm $registrationForm, NrcState $NrcState, NrcTownship $NrcTownship, NrcType $NrcType, Township $Township, State $State, EngineeringDiscipline $engineeringDiscipline)
    {
        parent::__construct($model);
        $this->PeRegistrationForm = $model;
        $this->RegistrationForm = $registrationForm;
        $this->NrcState = $NrcState;
        $this->NrcTownship = $NrcTownship;
        $this->NrcType  = $NrcType;
        $this->Township = $Township;
        $this->State = $State;
        $this->EngineeringDiscipline = $engineeringDiscipline;
    }
    public function getPeRegistrationForm()
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

    public function getNrcTwonship()
    {
        return $this->NrcTownship;
    }
    public function getNrcType()
    {
        return $this->NrcType;
    }
    public function getRegistrationForm()
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

    public function createRegistratonForm(array $baseRegistrationData, array $peData)
    {
        DB::beginTransaction();
        try {
            $registrationForm = $this->getRegistrationForm()->create($baseRegistrationData);
            $registrationFormId = $registrationForm->id;
            $peData["registration_id"] = $registrationFormId;
            $PeRegistrationForm = $this->model->create($peData);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating record: ' . $e->getMessage());
            throw $e;
        }
        DB::commit();
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
