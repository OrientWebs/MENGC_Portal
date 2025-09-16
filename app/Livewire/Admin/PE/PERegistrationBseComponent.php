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
    public $prePage, $nrc_township_en, $nrc_township_mm, $nrc_type_en, $nrc_type_mm, $nrc_state_en, $nrc_state_mm, $title, $register_no, $form_type, $name_en, $name_mm, $dob, $nrc_number_en, $nrc_number_mm, $father_name_en, $father_name_mm, $email, $tele_no_en, $tele_no_mm, $address_en, $address_mm, $state_id, $township_id, $fax_no, $nationality_type, $permanent_resident_no, $status, $gender;
    public $search = '';
    public $nrcStates = [];
    public $nrcTownshipsEn = [];
    public $nrcTownshipsMm = [];
    public $nrcTypes = [];
    protected $PEservice;
    public function boot(PeRegistrationService $service)
    {
        $this->verifyAuthorization("PEregistration-access");
        $this->PEservice = $service;
    }
    protected function rules()
    {
        // start with base rules from FormRequest

        // adjust depending on nationality_type
        if ($this->nationality_type === 'NRC') {
            $rules['nrc_state_en']    = 'required|string|max:50';
            $rules['nrc_township_en'] = 'required|string|max:50';
            $rules['nrc_type_en']     = 'required|string|max:50';
            $rules['nrc_number_en']   = 'required|string|max:50';
        }

        if ($this->nationality_type === 'PR') {
            $rules['permanent_resident_no'] = 'required|string|max:100';
            // you can unset NRC rules here if you want:
            // unset($rules['nrc_state_en'], $rules['nrc_township_en'], …);
        }

        return $rules;
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
            //require NRC fields

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