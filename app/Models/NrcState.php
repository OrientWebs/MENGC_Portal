<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NrcState extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'code_en',
        'code_mm',
        'name'
    ];
}
