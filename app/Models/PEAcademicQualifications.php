<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PEAcademicQualifications extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;
    use SoftDeletes;
    protected $table = "pe_academic_qualifications";

    protected $fillable = [
        'pe_form_id',
        'first_university_id',
        'first_graduation_year',
        'first_eng_disc_id',
        'first_acad_qual_id',
        'post_university_id',
        'post_graduation_year',
        'post_eng_disc_id',
        'post_acad_qual_id',
        'other_eng_disc_id',
        'other_graduation_year',
        'other_document_name_1',
        'other_document_name_2',
        'other_document_name_3',
        'other_document_name_4',
    ];
}