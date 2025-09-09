<?php

namespace App\Services;

use App\Models\User;

class PeRegistrationService
{
    protected PeRegistrationService $service;
    public function __construct(PeRegistrationService $peRegistrationService)
    {
        $this->service = $peRegistrationService;
    }
}
