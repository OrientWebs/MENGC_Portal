<?php

namespace App\Livewire\Admin\PE;

use Livewire\Component;
use App\Http\Requests\Pe\StorePeRegistrationFormRequest;
use App\Http\Requests\Pe\UpdatePeRegistrationFormRequest;
use App\Http\Requests\Pe\UpdatePeAcademicQualificationsRequest;
use App\Http\Requests\Registration\StoreBaseRegistrationFormRequest;
use App\Http\Requests\Registration\UpdateBaseRegistrationFormRequest;

class PeShowComponent extends PERegistrationBaseComponent
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
    public function edit($id): void
    {
        $peData = $this->PEservice->findPeRegistrationForm($id);
        if ($peData) {
            $profile_photo                  = $peData->registrationForm->getMedia('profile_photo')->first();
            $this->profile_photo_url        =  $profile_photo?->getUrl();
            $this->existing_profile_photo   =  $profile_photo?->id; // media id or path
            $this->professional_experience_pdf   =  $peData->getFirstMediaUrl('professional_experience_pdf'); // media id or path
            $this->discipline_involvement_pdf   =  $peData->getFirstMediaUrl('discipline_involvement_pdf'); // media id or path
            $this->significant_engineering_work_pdf   =  $peData->getFirstMediaUrl('significant_engineering_work_pdf'); // media id or path
            $this->verification_engineers_pdf   =  $peData->getFirstMediaUrl('verification_engineers_pdf'); // media id or path
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

            if ($peData->PeAcademicQualifications()) {
                $this->first_university_id       = $peData->PeAcademicQualifications->first_university_id;
                $this->pe_academic_qualifications_id       = $peData->PeAcademicQualifications->id;
                $this->first_graduation_year     = $peData->PeAcademicQualifications->first_graduation_year;
                $this->first_eng_disc_id         = $peData->PeAcademicQualifications->first_eng_disc_id;
                $this->first_acad_qual_id        = $peData->PeAcademicQualifications->first_acad_qual_id;
                $this->post_university_id        = $peData->PeAcademicQualifications->post_university_id ? $peData->PeAcademicQualifications->post_university_id : null;
                $this->post_university_id        = $peData->PeAcademicQualifications->post_university_id;
                $this->post_graduation_year      = $peData->PeAcademicQualifications->post_graduation_year;
                $this->post_eng_disc_id          = $peData->PeAcademicQualifications->post_eng_disc_id;
                $this->post_acad_qual_id         = $peData->PeAcademicQualifications->post_acad_qual_id;
                $this->other_eng_disc_id        = $peData->PeAcademicQualifications->other_eng_disc_id;
                $this->other_graduation_year     = $peData->PeAcademicQualifications->other_graduation_year;
                $this->other_document_name_1     = $peData->PeAcademicQualifications->other_document_name_1;
                $this->other_document_name_2     = $peData->PeAcademicQualifications->other_document_name_2;
                $this->other_document_name_3     = $peData->PeAcademicQualifications->other_document_name_3;
                $this->other_document_name_4     = $peData->PeAcademicQualifications->other_document_name_4;
                $this->other_qualification       = $peData->PeAcademicQualifications->other_qualification;
            }
        }
    }
    public function update()
    {

        $baseValidated  = UpdateBaseRegistrationFormRequest::validate($this);
        $peValidated    = UpdatePeRegistrationFormRequest::validate($this);
        $peAcademicValidated = UpdatePeAcademicQualificationsRequest::validate($this);
        // dd($baseValidated, $peValidated, $peAcademicValidated);
        $this->PEservice->update(
            $this->pe_registration_id,
            $baseValidated,
            $peValidated,
            $peAcademicValidated,
            $this->nrc_card_front,
            $this->nrc_card_back,
            $this->profile_photo
        );

        $this->flashMessage('success', 'PE registration updated successfully!');
        return redirect()->route('admin.pe-form-index');
    }


    public function render()
    {
        return view('admin.pe.show');
    }
}
