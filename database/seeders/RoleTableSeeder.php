<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'Admin',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Super Admin',
                'guard_name' => 'web'
            ],
            [
                'name' => 'User',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Regestration Department',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Finance Department',
                'guard_name' => 'web'
            ]
        ];
        foreach ($roles as $role) {
            Role::create([
                'name' => $role['name'],
                'guard_name' => $role['guard_name'],
                'is_active' => 1,
            ]);
        }
    }
}
