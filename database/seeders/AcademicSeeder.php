<?php

namespace Database\Seeders;

use App\Models\Academic;
use App\Models\AcademicDiscipline;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademicSeeder extends Seeder
{
    public function run(): void
    {
        $disciplines = [
            [
                'id'    => '1',
                'name'  => 'Civil',
            ],
            [
                'id'    => '2',
                'name'  => 'Mechanical',
            ],
            [
                'id'    => '3',
                'name'  => 'Electronic',
            ],
            [
                'id'    => '4',
                'name'  => 'Information Technology',
            ],
            [
                'id'    => '5',
                'name'  => 'Metallurgy',
            ],
            [
                'id'    => '6',
                'name'  => 'Chemical',
            ],
            [
                'id'    => '7',
                'name'  => 'Textile',
            ],
            [
                'id'    => '8',
                'name'  => 'Mining',
            ],
            [
                'id'    => '9',
                'name'  => 'Petroleum',
            ],
            [
                'id'    => '10',
                'name'  => 'Aerospace',
            ],
            [
                'id'    => '11',
                'name'  => 'Mechatronic',
            ],
            [
                'id'    => '12',
                'name'  => 'Electrical Power',
            ],
            [
                'id'    => '13',
                'name'  => 'Nuclear Technology',
            ],
        ];
        Academic::insert($disciplines);
    }
}
