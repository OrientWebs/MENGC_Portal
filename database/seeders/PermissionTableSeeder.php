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

            // Menu Permissions
            'menu-setup',
            'menu-user-management',

            //User Permissions
            'user-access',
            'user-edit',
            'user-delete',
            'user-create',
            'user-show',

            // Role Permissions
            'role-access',
            'role-create',
            'role-edit',
            'role-show',
            'role-delete',

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

            // University Permissions,
            'university-access',
            'university-create',
            'university-edit',
            'university-show',
            'university-delete',

            // Academic Permissions,
            'academic-access',
            'academic-create',
            'academic-edit',
            'academic-show',
            'academic-delete',

            // Qualification Permissions,
            'qualification-access',
            'qualification-create',
            'qualification-edit',
            'qualification-show',
            'qualification-delete',

            // Discipline Permissions,
            'discipline-access',
            'discipline-create',
            'discipline-edit',
            'discipline-show',
            'discipline-delete',

            // Ministry Permissions,
            'ministry-access',
            'ministry-create',
            'ministry-edit',
            'ministry-show',
            'ministry-delete',

            // Prerequisitc Permissions,
            'prerequistic-access',
            'prerequistic-create',
            'prerequistic-edit',
            'prerequistic-show',
            'prerequistic-delete',

            //PE registration Form
            'PEregistration-access',
            'PEregistration-create',
            'PEregistration-delete',
            'PEregistration-edit',
            'PEregistration-show',
            'PEregistration-admin',
            'PEregistration-access',

        ];

        foreach ($permissions as $permission) {
            Permission::findOrCreate($permission);
        }
    }
}
