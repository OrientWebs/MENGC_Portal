<?php

namespace App\Repositories;

use App\Models\NrcState;
use App\Models\NrcTownship;
use App\Models\NrcType;
use App\Models\PERegistrationForm;
use App\Models\RegistrationForm;
use App\Utilities\BaseCrudRepository;

class PErepository extends BaseCrudRepository
{
    private $RegistrationForm;
    private $NrcState;
    private $NrcTownship;
    private $NrcType;
    public function __construct(PERegistrationForm $model, RegistrationForm $registrationForm, NrcState $NrcState, NrcTownship $NrcTownship, NrcType $NrcType)
    {
        parent::__construct($model);
        $this->RegistrationForm = $registrationForm;
        $this->NrcState = $NrcState;
        $this->NrcTownship = $NrcTownship;
        $this->NrcType  = $NrcType;
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
}
