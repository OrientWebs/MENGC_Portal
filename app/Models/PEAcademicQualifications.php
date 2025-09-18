<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PEAcademicQualifications extends Model
{
    use SoftDeletes;
    protected $table = "pe_academic_qualifications";

    protected $fillable = [
        'pe_form_id',
        'university_id',
        'graduation_year',
        'graduation_month',
        'engineering_discipline_id',
        'academic_qualification_id',
        'qualification_name',
        'qualification_type',
    ];
}
