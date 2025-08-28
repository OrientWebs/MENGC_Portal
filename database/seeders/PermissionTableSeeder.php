<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'dashboard-access',
            'dashboard-login',
            'dashboard-settings',
            'user-access',
            'user-edit',
            'user-delete',
            'user-create',
            'user-show',
            'role-access',
            'role-create',
            'role-edit',
            'role-show',
            'role-delete',
            'menu-setup',
            'menu-user-management',

            // State Permissions
            'state-access',
            'state-create',
            'state-edit',
            'state-show',
            'state-delete',

            // Township Permissions,
            'township-access',
            'township-create',
            'township-edit',
            'township-show',
            'township-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::findOrCreate($permission);
        }
    }
}
