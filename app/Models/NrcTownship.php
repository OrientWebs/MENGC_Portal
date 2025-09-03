<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NrcTownship extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name_en',
        'name_mm',
        'state_id'
    ];

    public function state()
    {
        return $this->belongsTo(NrcState::class, 'state_id', 'id');
    }
}
