<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as spatie_permission;

class Permission extends spatie_permission
{
    use HasFactory;
    
    protected $table = 'Permissions';
    protected $guarded = [];
    protected $attributes = [
        'guard_name' => 'web',
    ];
}
