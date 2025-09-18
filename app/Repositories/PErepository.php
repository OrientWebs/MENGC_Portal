<?php

namespace App\Repositories;

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
    public function __construct(PERegistrationForm $model, RegistrationForm $registrationForm, NrcState $NrcState, NrcTownship $NrcTownship, NrcType $NrcType, Township $Township, State $State)
    {
        parent::__construct($model);
        $this->RegistrationForm = $registrationForm;
        $this->NrcState = $NrcState;
        $this->NrcTownship = $NrcTownship;
        $this->NrcType  = $NrcType;
        $this->Township = $Township;
        $this->State = $State;
    }
    public function getNrcState()
    {
        return $this->NrcState;
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

    public function createRegistratonForm(array $data)
    {
        DB::beginTransaction();
        try {
            $record = $this->getRegistrationForm()->create($data);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating record: ' . $e->getMessage());
            throw $e;
        }
        DB::commit();
        return $record;
    }

    public function generateRegisterNo()
    {
        $latest = $this->getRegistrationForm()->latest('id')->first();

        if ($latest) {
            $number = (int)substr($latest->register_no, -5);
            $number++;
            return 'PE:' . str_pad($number, 5, '0', STR_PAD_LEFT);
        } else {
            return 'PE:00001';
        }
    }
}
