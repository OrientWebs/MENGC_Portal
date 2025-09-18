<?php

namespace Database\Seeders;

use App\Models\AcademicQualification;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class QualificationSeeder extends Seeder
{
    public function run(): void
    {
        $academic_qualification = [
            [
                'id'    => '1',
                'name'  => 'BE',
                'created_at'  => Carbon::now()->format('Y-m-d'),

            ],
            [
                'id'    => '2',
                'name'  => 'Ph.D',
                'created_at'          => Carbon::now()->format('Y-m-d'),

            ],
            [
                'id'    => '3',
                'name'  => 'BTech',
                'created_at'          => Carbon::now()->format('Y-m-d'),

            ],
            [
                'id'    => '4',
                'name'  => 'AGTI',
                'created_at'          => Carbon::now()->format('Y-m-d'),

            ],
            [
                'id'    => '5',
                'name'  => 'EGTI',
                'created_at'          => Carbon::now()->format('Y-m-d'),

            ],
            [
                'id'    => '6',
                'name'  => 'Dip Tech',
                'created_at'          => Carbon::now()->format('Y-m-d'),

            ],
            [
                'id'    => '7',
                'name'  => 'Other',
                'created_at'          => Carbon::now()->format('Y-m-d'),

            ],
        ];
        AcademicQualification::insert($academic_qualification);
    }
}
