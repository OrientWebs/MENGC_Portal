<?php

namespace App\Repositories;

use App\Models\PERegistrationForm;
use App\Utilities\BaseCrudRepository;

class PeRegistrationRepository extends BaseCrudRepository
{
    public function __construct(PERegistrationForm $model)
    {
        parent::__construct($model);
    }
}
