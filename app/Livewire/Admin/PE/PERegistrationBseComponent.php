<?php

namespace App\Livewire\Admin\PE;

use App\Services\PeRegistrationService;
use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\HandlePageState;
use Livewire\Attributes\Layout;
use App\Traits\AuthorizeRequests;
use App\Traits\HandleFlashMessage;

class PERegistrationBseComponent extends Component
{
    use WithPagination, AuthorizeRequests, HandlePageState, HandleFlashMessage;
    #[Layout('admin.layouts.app')]
    // this is base form
    public $prePage, $nrc_township_en, $nrc_township_mm, $nrc_type_en, $nrc_type_mm, $nrc_state_en, $nrc_state_mm, $title, $register_no, $form_type, $name_en, $name_mm, $dob, $nrc_no_en, $nrc_no_mm, $father_name_en, $father_name_mm, $email, $tele_no_en, $tele_no_mm, $address_en, $address_mm, $state_id, $township_id, $fax_no, $nationality_type, $permanent_resident_no, $status, $gender;
    public $search = '';
    protected $PEservice;
    public function boot(PeRegistrationService $service)
    {
        $this->verifyAuthorization("PEregistration-access");
        $this->PEservice = $service;
    }
}
