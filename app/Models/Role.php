<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as Spatie_Role;

class Role extends Spatie_Role
{
    use HasFactory;

    protected $table = 'roles';
    protected $guarded = [];
    protected $attributes = [
        'guard_name' => 'web',
    ];

    protected $fillable = [
        'name',
        'guard_name',
        'is_active'
    ];
}
