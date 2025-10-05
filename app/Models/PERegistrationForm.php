<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PERegistrationForm extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;
    use SoftDeletes;
    protected $table = "pe_registration_forms";

    protected $fillable = [
        'registration_id',

        // Permanent Contact Address
        'perm_address_en',
        'perm_address_mm',
        'perm_state_id',
        'perm_township_id',
        'perm_post_code',
        'perm_tele_no',
        'perm_fax_no',
        'perm_email',

        // Designation and Office Address
        'des_address_en',
        'des_address_mm',
        'des_state_id',
        'des_township_id',
        'des_post_code',
        'des_tele_no',
        'des_fax_no',
        'des_email',

        // Engineering Discipline
        'engineering_discipline_id',

        // Boolean requirements
        'exp_15_years',
        'meet_all_requirements',
        'no_disciplinary_action',
    ];

    public function registrationForm()
    {
        return $this->belongsTo(RegistrationForm::class, 'registration_id', 'id');
    }

    // public function registerMediaCollections(): void
    // {
    //     $this->addMediaCollection('professional_experience_pdf')->singleFile()->useDisk(config('filesystems.default'));
    // }

    public function PeAcademicQualifications()
    {
        return $this->hasOne(PEAcademicQualifications::class, 'pe_form_id', 'id');
    }
}
