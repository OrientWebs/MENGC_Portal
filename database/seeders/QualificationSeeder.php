<?php

namespace Database\Seeders;

use App\Models\AcademicQualification;
use Illuminate\Database\Seeder;

class QualificationSeeder extends Seeder
{
    public function run(): void
    {
        $academic_qualification = [
            [
                'id'    => '1',
                'name'  => 'BE',
            ],
            [
                'id'    => '2',
                'name'  => 'Ph.D',
            ],
            [
                'id'    => '3',
                'name'  => 'BTech',
            ],
            [
                'id'    => '4',
                'name'  => 'AGTI',
            ],
            [
                'id'    => '5',
                'name'  => 'EGTI',
            ],
            [
                'id'    => '6',
                'name'  => 'Dip Tech',
            ],
            [
                'id'    => '7',
                'name'  => 'Other',
            ],
        ];
        AcademicQualification::insert($academic_qualification);
    }
}
