<?php

namespace App\Livewire\Admin\PE;

use Livewire\Component;
use App\Http\Requests\Pe\StorePeRegistrationFormRequest;
use App\Http\Requests\Registration\StoreBaseRegistrationFormRequest;
use App\Http\Requests\Registration\UpdateBaseRegistrationFormRequest;

class PEeditComponent extends PERegistrationBseComponent
{

    public $pe_registration_id;
    public function mount($id = null)
    {
        $this->verifyAuthorization("PEregistration-edit");
        $this->pe_registration_id = $id;
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
        $peData = $this->PEservice->findPeRegistrationForm($id);
        if ($peData) {
            $profile_photo                  = $peData->registrationForm->getMedia('profile_photo')->first();
            $this->profile_photo_url        =  $profile_photo?->getUrl();
            $this->existing_profile_photo   =  $profile_photo?->id; // media id or path

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
            $this->engineering_discipline_id    = $peData->engineering_discipline_id;
            $this->exp_15_years                 = $peData->exp_15_years;
            $this->meet_all_requirements        = $peData->meet_all_requirements;
            $this->no_disciplinary_action       = $peData->no_disciplinary_action;
            if ($this->des_state_id) {
                $this->desTownships = $this->PEservice->getTownships($this->des_state_id);
            }

            if ($peData->registrationForm->nationality_type === 'NRC') {
                $nrcEn = parse_nrc($peData->registrationForm->nrc_no_en, 'en');
                $this->nrc_state_en     = $nrcEn['state_id'] ?? null;
                $this->nrc_township_en  = $nrcEn['township'] ?? null;
                $this->nrc_type_en      = $nrcEn['type'] ?? null;
                $this->nrc_number_en    = $nrcEn['number'] ?? null;

                $front = $peData->registrationForm->getMedia('nrc_photo_front')->first();
                $back  = $peData->registrationForm->getMedia('nrc_photo_back')->first();

                $this->nrc_card_front_url = $front?->getUrl();
                $this->nrc_card_back_url  = $back?->getUrl();
                $this->existing_nrc_card_front = $front?->id; // media id or path
                $this->existing_nrc_card_back  = $back?->id;
                $nrcMm = parse_nrc($peData->registrationForm->nrc_no_mm, 'mm');
                $this->nrc_state_mm = $nrcMm['state_id'] ?? null;
                $this->nrc_township_mm = $nrcMm['township'] ?? null;
                $this->nrc_type_mm     = $nrcMm['type'] ?? null;
                $this->nrc_number_mm   = $nrcMm['number'] ?? null;
                if ($this->nrc_state_en) {
                    $this->nrcTownshipsEn = $this->PEservice->getNrcTownship($this->nrc_state_en);
                }
                if ($this->nrc_state_mm) {
                    $this->nrcTownshipsMm = $this->PEservice->getNrcTownship($this->nrc_state_mm);
                }
            }
        }
    }
    public function __update()
    {
        $baseValidated  = StoreBaseRegistrationFormRequest::validate($this);
        $peValidated    = StorePeRegistrationFormRequest::validate($this);
        $this->PEservice->update($this->pe_registration_id, $baseValidated, $peValidated);

        $this->flashMessage('success', 'PE registration update successfully!');
        return redirect()->route('admin.pe-form-index');
    }

    public function update()
    {

        $baseValidated  = UpdateBaseRegistrationFormRequest::validate($this);
        $peValidated    = StorePeRegistrationFormRequest::validate($this);
        $this->PEservice->update(
            $this->pe_registration_id,
            $baseValidated,
            $peValidated,
            $this->nrc_card_front,
            $this->nrc_card_back,
            $this->profile_photo
        );

        $this->flashMessage('success', 'PE registration updated successfully!');
        return redirect()->route('admin.pe-form-index');
    }


    public function render()
    {
        return view('admin.pe.edit');
    }
}