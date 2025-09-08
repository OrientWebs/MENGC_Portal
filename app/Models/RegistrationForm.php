<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegistrationForm extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'register_no',
        'form_type',
        'name_en',
        'name_mm',
        'father_name_en',
        'father_name_mm',
        'dob',
        'nrc_no_en',
        'nrc_no_mm',
        'email',
        'tele_no_en',
        'tele_no_mm',
        'address_en',
        'address_mm',
        'state_id',
        'township_id',
        'fax_no',
        'nationality_type',
        'permanent_resident_no',
        'status',
        // Add file columns here if you store paths in DB
        'photo_path',
        'pdf_path',
        'excel_path'
    ];
}
