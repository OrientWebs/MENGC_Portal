<?php

namespace App\Livewire\Admin\PE;

use App\Services\PeRegistrationService;
use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\HandlePageState;
use Livewire\Attributes\Layout;
use App\Traits\AuthorizeRequests;
use App\Traits\HandleFlashMessage;
use Livewire\WithFileUploads;

class PERegistrationBseComponent extends Component
{
    use WithPagination, AuthorizeRequests, HandlePageState, HandleFlashMessage, WithFileUploads;
    #[Layout('admin.layouts.app')]
    // this is base form
    public $prePage, $nrc_township_en, $nrc_township_mm, $nrc_type_en, $nrc_type_mm, $nrc_state_en, $nrc_state_mm, $title, $register_no, $form_type, $name_en, $name_mm, $dob, $nrc_number_en, $nrc_number_mm, $father_name_en, $father_name_mm, $email, $tele_no_en, $tele_no_mm, $address_en, $address_mm, $state_id, $township_id, $fax_no, $nationality_type, $permanent_resident_no, $status, $gender;
    public $registration_id, $perm_address_en, $perm_address_mm, $perm_state_id, $perm_township_id, $perm_post_code, $perm_tele_no, $perm_fax_no, $perm_email, $des_address_en, $des_address_mm, $des_state_id, $des_township_id, $des_post_code, $des_tele_no, $des_fax_no, $des_email, $engineering_discipline_id, $exp_15_years, $meet_all_requirements, $no_disciplinary_action;
    public $nrc_card_front, $nrc_card_back, $registration_photo, $nrc_card_front_url, $nrc_card_back_url, $existing_nrc_card_front, $existing_nrc_card_back, $profile_photo, $profile_photo_url, $existing_profile_photo;
    public $professional_experience_pdf, $discipline_involvement_pdf, $significant_engineering_work_pdf, $verification_engineers_pdf;
    public $search = '';
    public $nrcStates = [];
    public $nrcTownshipsEn = [];
    public $nrcTownshipsMm = [];
    public $nrcTypes = [];
    public $states = [];
    public $permTownships = [];
    public $desTownships = [];
    protected $PEservice;
    public $engineeringDisciplines = [];
    public function boot(PeRegistrationService $service)
    {
        $this->verifyAuthorization("PEregistration-access");
        $this->PEservice = $service;
        $this->states = $this->PEservice->states()->pluck('name', 'id');
        $this->engineeringDisciplines = $this->PEservice->engineeringDisciplines()->pluck('name', 'id');
    }
    public function updatedPermStateId()
    {
        $this->permTownships = $this->PEservice->getTownships($this->perm_state_id);
        $this->perm_township_id = null;
    }
    public function updatedDesStateId()
    {
        $this->desTownships = $this->PEservice->getTownships($this->des_state_id);
        $this->des_township_id = null;
    }
    public function updatedNationalityType($value)
    {
        if ($value === 'PR') {
            $this->reset([
                'nrc_state_en',
                'nrc_township_en',
                'nrc_type_en',
                'nrc_number_en',
                'nrc_state_mm',
                'nrc_township_mm',
                'nrc_type_mm',
                'nrc_number_mm'
            ]);
            //require PR fields
        }
        if ($value === 'NRC') {
            $this->reset(['permanent_resident_no']);
        }
    }

    public function updatedNrcStateEn($stateId)
    {
        $this->nrcTownshipsEn = $this->PEservice->getNrcTownship($stateId);
        $this->nrc_township_en = null;
    }

    public function updatedNrcStateMm($stateId)
    {
        $this->nrcTownshipsMm = $this->PEservice->getNrcTownship($stateId);
        $this->nrc_township_mm = null;
    }
}