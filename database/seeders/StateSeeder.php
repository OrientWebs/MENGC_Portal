<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            [
                'id'    => 1,
                'name' => 'Kachin',
                'abbreviation' => 'KAC'
            ],
            [
                'id'    => 2,
                'name' => 'Kayah',
                'abbreviation' => 'KAY'
            ],
            [
                'id'    => 3,
                'name' => 'Kayin',
                'abbreviation' => 'KYN'
            ],
            [
                'id'    => 4,
                'name' => 'Chin',
                'abbreviation' => 'CHN'
            ],
            [
                'id'    => 5,
                'name' => 'Sagaing',
                'abbreviation' => 'SG'
            ],
            [
                'id'    => 6,
                'name' => 'Tanintharyi',
                'abbreviation' => 'TN'
            ],
            [
                'id'    => 7,
                'name' => 'Bago(East)',
                'abbreviation' => 'BGO'
            ],
            [
                'id'    => 8,
                'name' => 'Bago(West)',
                'abbreviation' => 'BGO'
            ],
            [
                'id'    => 9,
                'name' => 'Magway',
                'abbreviation' => 'MGY'
            ],
            [
                'id'    => 10,
                'name' => 'Mandalay',
                'abbreviation' => 'MDY'
            ],
            [
                'id'    => 11,
                'name' => 'Mon',
                'abbreviation' => 'MON'
            ],
            [
                'id'    => 12,
                'name' => 'Rakhine',
                'abbreviation' => 'RKH'
            ],
            [
                'id'    => 13,
                'name' => 'Yangon',
                'abbreviation' => 'YGN'
            ],
            [
                'id'    => 14,
                'name' => 'Shan(South)',
                'abbreviation' => 'SHN'
            ],
            [
                'id'    => 15,
                'name' => 'Shan(North)',
                'abbreviation' => 'SHN'
            ],
            [
                'id'    => 16,
                'name' => 'Shan(East)',
                'abbreviation' => 'SHN'
            ],
            [
                'id'    => 17,
                'name' => 'Ayeyarwady',
                'abbreviation' => 'AYW'
            ],
            [
                'id'    => 18,
                'name' => 'Nay Pyi Taw',
                'abbreviation' => 'NPT'
            ],
            [
                'id'    => 19,
                'name' => 'Shan',
                'abbreviation' => 'SHN'
            ],
        ];
        State::insert($states);
    }
}
