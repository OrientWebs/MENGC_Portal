<?php

namespace Database\Seeders;

use App\Models\EngineeringDiscipline;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DisciplineSeeder extends Seeder
{
    public function run(): void
    {
        $engr_disciplines = [
            [
                'id'    => '1',
                'name'  => 'Construction',
            ],
            [
                'id'    => '2',
                'name'  => 'Construction(Road)',
            ],
            [
                'id'    => '3',
                'name'  => 'Construction(Road & Bridge)',
            ],
            [
                'id'    => '4',
                'name'  => 'Construction (QS)',
            ],
            [
                'id'    => '5',
                'name'  => 'Structural',
            ],
            [
                'id'    => '6',
                'name'  => 'Water Resources',
            ],
            [
                'id'    => '7',
                'name'  => 'Water Supply and Sanitation',
            ],
            [
                'id'    => '8',
                'name'  => 'Geotechnical',
            ],
            [
                'id'    => '9',
                'name'  => 'Environmental',
            ],
            [
                'id'    => '10',
                'name'  => 'Transportation',
            ],
            [
                'id'    => '11',
                'name'  => 'Mechanical (Building Services - BS)',
            ],
            [
                'id'    => '12',
                'name'  => 'Mechanical (Maintenance of Plant and Equipment - MPE)',
            ],
            [
                'id'    => '13',
                'name'  => 'Mechanical (Industrial Manufacturing Process and Material - IMPM)',
            ],
            [
                'id'    => '14',
                'name'  => 'Mechanical (Aircon, Refrigeration,Mechanical Ventilation and Heating -HVAC)',
            ],
            [
                'id'    => '15',
                'name'  => 'Electrical (Building Services - BS)',
            ],
            [
                'id'    => '16',
                'name'  => 'Electrical (Electrical Power -EP)',
            ],
            [
                'id'    => '17',
                'name'  => 'Electronic',
            ],
            [
                'id'    => '18',
                'name'  => 'Electronic (Building Services - BS)',
            ],
            [
                'id'    => '19',
                'name'  => 'Information Technology',
            ],
            [
                'id'    => '20',
                'name'  => 'Metallurgy',
            ],
            [
                'id'    => '21',
                'name'  => 'Chemical',
            ],
            [
                'id'    => '22',
                'name'  => 'Textile',
            ],
            [
                'id'    => '23',
                'name'  => 'Mining',
            ],
            [
                'id'    => '24',
                'name'  => 'Petroleum',
            ],
            [
                'id'    => '25',
                'name'  => 'Aerospace',
            ],
            [
                'id'    => '26',
                'name'  => 'Mechatronic',
            ],
            [
                'id'    => '27',
                'name'  => 'Nuclear Technology',
            ],
            [
                'id'    => '28',
                'name'  => 'Construction(Bridge)',
            ],

        ];
        EngineeringDiscipline::insert($engr_disciplines);
    }
}
