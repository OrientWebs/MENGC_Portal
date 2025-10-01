<?php

namespace App\Livewire\Traits;

use App\Services\PeService;

trait HandlesNrcDropdowns
{
    public $nrcStates = [];
    public $nrcTownshipsEn = [];
    public $nrcTownshipsMm = [];
    public $nrc_state_en;
    public $nrc_state_mm;
    public $nrc_township_en;
    public $nrc_township_mm;

    /**
     * Load NRC states (call this in mount)
     */
    public function loadNrcStates(PeService $service): void
    {
        $this->nrcStates = $service->getAllNrcState();
    }

    public function updatedNrcStateEn($stateId): void
    {
        $this->nrcTownshipsEn = app(PeService::class)->getNrcTownship($stateId);
        $this->nrc_township_en = null;
    }

    public function updatedNrcStateMm($stateId): void
    {
        $this->nrcTownshipsMm = app(PeService::class)->getNrcTownship($stateId);
        $this->nrc_township_mm = null;
    }
}
