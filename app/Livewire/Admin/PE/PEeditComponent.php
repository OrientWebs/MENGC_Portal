<?php

namespace App\Livewire\Admin\PE;

use Livewire\Component;
use App\Http\Requests\Pe\StorePeRegistrationFormRequest;
use App\Http\Requests\Registration\StoreBaseRegistrationFormRequest;

class PEeditComponent extends PERegistrationBseComponent
{

    public function mount($id = null)
    {
        $this->verifyAuthorization("PEregistration-edit");
        $this->nrcStates = $this->PEservice->getAllNrcState();
        $this->nrcTypes  = $this->PEservice->getNrcType();;
        if (!empty($this->nrcTypes)) {
            $this->nrc_type_en = $this->nrcTypes[0]->name_en;
            $this->nrc_type_mm = $this->nrcTypes[0]->name_mm;
        }
        $this->edit($id);
    }
    public function edit($id)
    {
        $peData = $this->PEservice->findPeForm($id);
        if ($peData) {
            $this->title                    = $peData->registrationForm->title;
            $this->father_name_en           = $peData->registrationForm->father_name_en;
            $this->father_name_mm           = $peData->registrationForm->father_name_mm;
            $this->name_en                  = $peData->registrationForm->name_en;
            $this->name_mm                  = $peData->registrationForm->name_mm;
            $this->nrc_type_en              = $peData->registrationForm->nrc_type_en;
            $this->nrc_type_mm              = $peData->registrationForm->nrc_type_mm;
            $this->register_no              = $peData->registrationForm->register_no;
            $this->gender                   = $peData->registrationForm->gender;
            $this->dob                      = $peData->registrationForm->dob;
            $this->nationality_type         = $peData->registrationForm->nationality_type;
            $this->permanent_resident_no    = $peData->registrationForm->permanent_resident_no;

            $this->perm_state_id        = $peData->perm_state_id;
            $this->perm_township_id     = $peData->perm_township_id;
            $this->perm_address_en      = $peData->perm_address_en;
            $this->perm_post_code       = $peData->perm_post_code;
            $this->perm_tele_no         = $peData->perm_tele_no;
            $this->perm_email           = $peData->perm_email;
            $this->perm_fax_no          = $peData->perm_fax_no;
            $this->perm_address_mm      = $peData->perm_address_mm;
            if ($this->perm_state_id) {
                $this->permTownships    = $this->PEservice->getTownships($this->perm_state_id);
            }
            $this->des_address_en       = $peData->perm_address_en;
            $this->des_address_mm       = $peData->perm_address_mm;
            $this->des_post_code        = $peData->des_post_code;
            $this->des_state_id         = $peData->des_state_id;
            $this->des_township_id      = $peData->des_township_id;
            $this->des_post_code        = $peData->des_post_code;
            $this->des_tele_no          = $peData->des_tele_no;
            $this->des_fax_no           = $peData->des_fax_no;
            $this->des_email            = $peData->des_email;
            $this->engineering_discipline_id = $peData->engineering_discipline_id;
            $this->exp_15_years         = $peData->exp_15_years;
            $this->meet_all_requirements = $peData->meet_all_requirements;
            $this->no_disciplinary_action = $peData->no_disciplinary_action;
            if ($this->des_state_id) {
                $this->desTownships = $this->PEservice->getTownships($this->des_state_id);
            }
        }
    }
    public function update()
    {
        $baseValidated = StoreBaseRegistrationFormRequest::validate($this);
        $peValidated = StorePeRegistrationFormRequest::validate($this);
        $this->PEservice->create($baseValidated, $peValidated);

        $this->flashMessage('success', 'PE registration saved successfully!');
        return redirect()->route('admin.dashboard');
    }

    public function render()
    {
        return view('admin.pe.edit');
    }
}