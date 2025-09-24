<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class RegistrationForm extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'register_no',
        'user_id',
        'title',
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
        'gender',
        'excel_path'
    ];

    // nrc_front_photo , nrc_back_photo and register_photo
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function registerMediaCollections(): void
    {
        // profile photo: single file only
        $this->addMediaCollection('profile_photo')->singleFile()->useDisk(config('filesystems.default'));

        // nrc images (front/back)
        $this->addMediaCollection('nrc_photo_front')->useDisk(config('filesystems.default'));
        $this->addMediaCollection('nrc_photo_back')->useDisk(config('filesystems.default'));
        // $this->addMediaCollection('nrc_photo_back')->useDisk('local');

        // other documents (pdf, excel)
        $this->addMediaCollection('documents')->useDisk(config('filesystems.default'));
    }
}