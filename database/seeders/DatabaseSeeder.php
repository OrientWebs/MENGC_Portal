<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
        ]);
        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
        ]);
        User::factory()->create([
            'name' => 'Henry',
            'email' => 'henry@gmail.com',
        ]);
        $this->call([
            PermissionTableSeeder::class,
            RoleTableSeeder::class,
            RolePermissionSeeder::class,
            UserRolePermissionSeeder::class,
            StateSeeder::class,
            TwonshipSeeder::class,
            UniversitySeeder::class,
            AcademicSeeder::class,
            QualificationSeeder::class,
            EngineeringDisciplineSeeder::class,
            MinistrySeeder::class,
            PrerequisticSeeder::class
        ]);
    }
}
