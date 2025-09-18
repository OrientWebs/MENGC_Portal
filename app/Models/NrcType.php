<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NrcType extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name_en',
        'name_mm'
    ];
}
