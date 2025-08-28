<?php

namespace Database\Seeders;

use App\Models\State;
use App\Models\Township;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TwonshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            [
                'name' => 'KyiMyinDaing',
                'state_id' => 13
            ],
            [
                'name' => 'Hlaingtharyar',
                'state_id' => 13
            ],
            [
                'name' => 'Shwepyitha',
                'state_id' => 13
            ],
            [
                'name' => 'Insein',
                'state_id' => 13
            ],
            [
                'name' => 'Mayangone',
                'state_id' => 13
            ],
            [
                'name' => 'Sanchaung',
                'state_id' => 13
            ],
            [
                'name' => 'Kyauktada',
                'state_id' => 13
            ],
            [
                'name' => 'Latha',
                'state_id' => 13
            ],
            [
                'name' => 'Pabedan',
                'state_id' => 13
            ],
            [
                'name' => 'Dagon Seikkan',
                'state_id' => 13
            ],
            [
                'name' => 'Botahtaung',
                'state_id' => 13
            ],
            [
                'name' => 'Tamwe',
                'state_id' => 13
            ],
            [
                'name' => 'Thingangyun',
                'state_id' => 13
            ],
            [
                'name' => 'Yankin',
                'state_id' => 13
            ],
            [
                'name' => 'North Okkalapa',
                'state_id' => 13
            ],
            [
                'name' => 'South Okkalapa',
                'state_id' => 13
            ],
            [
                'name' => 'Hlaing',
                'state_id' => 13
            ],
            [
                'name' => 'Mayangon',
                'state_id' => 13
            ],
            [
                'name' => 'Ahlone',
                'state_id' => 13
            ],
            [
                'name' => "Dagon Myothit (East)",
                'state_id' => 13
            ],
            [
                'name' => "Dagon Myothit (North)",
                'state_id' => 13
            ],
            [
                'name' => 'Dagon Myothit (South)',
                'state_id' => 13
            ],
            [
                'name' => 'Dagon Myothit (West)',
                'state_id' => 13
            ],
            [
                'name' => 'Hlegu',
                'state_id' => 13
            ],
            [
                'name' => 'TaikGyi',
                'state_id' => 13
            ],
            [
                'name' => 'Mingaladon',
                'state_id' => 13
            ],
            [
                'name' => 'Htantabin',
                'state_id' => 13
            ],
            [
                'name' => 'Kyauktan',
                'state_id' => 13
            ],
            [
                'name' => 'Thanlyin',
                'state_id' => 13
            ],
            [
                'name' => 'Thongwa',
                'state_id' => 13
            ],
            [
                'name' => 'Twantay',
                'state_id' => 13
            ],
            [
                'name' => 'Kungyangon',
                'state_id' => 13
            ],
            [
                'name' => 'Dedaye',
                'state_id' => 13
            ],
            [
                'name' => 'Aungmyethazan',
                'state_id' => 10
            ],
            [
                'name' => 'Chanayethazan',
                'state_id' => 10
            ],
            [
                'name' => 'Mahaaungmye',
                'state_id' => 10
            ],
            [
                'name' => 'Pyigyidagun',
                'state_id' => 10
            ],
            [
                'name' => 'NyaungU',
                'state_id' => 10
            ],
            [
                'name' => 'Taungtha',
                'state_id' => 10
            ],
            [
                'name' => 'Myingyan',
                'state_id' => 10
            ],
            [
                'name' => 'Kyaukpadaung',
                'state_id' => 10
            ],
            [
                'name' => 'Natogyi',
                'state_id' => 10
            ],
            [
                'name' => 'Patheingyi',
                'state_id' => 10
            ],
            [
                'name' => 'Pyinoolwin',
                'state_id' => 10
            ],
            [
                'name' => 'Chanmyathazi',
                'state_id' => 10
            ],
            [
                'name' => 'Amarapura',
                'state_id' => 10
            ],
            [
                'name' => 'Mogok',
                'state_id' => 10
            ],
            [
                'name' => 'Patheingyi',
                'state_id' => 10
            ],
            [
                'name' => 'Kyaukse',
                'state_id' => 10
            ],
            [
                'name' => 'Myittha',
                'state_id' => 10
            ],
            [
                'name' => 'Sintgaing',
                'state_id' => 10
            ],
            [
                'name' => 'TadaU',
                'state_id' => 10
            ],
            [
                'name' => 'Wundwin',
                'state_id' => 10
            ],
            [
                'name' => 'Zeyar Thiri',
                'state_id' => 18
            ],
            [
                'name' => 'Pyinmana',
                'state_id' => 18
            ],
            [
                'name' => 'Tatkon',
                'state_id' => 18
            ],
            [
                'name' => 'Lewe',
                'state_id' => 18
            ],
            [
                'name' => 'Pobbathiri',
                'state_id' => 18
            ],
            [
                'name' => 'Dekkhinathiri',
                'state_id' => 18
            ],
            [
                'name' => 'Kyaikto',
                'state_id' => 11
            ],
            [
                'name' => 'Bilin',
                'state_id' => 11
            ],
            [
                'name' => 'Thaton',
                'state_id' => 11
            ],
            [
                'name' => 'Mudon',
                'state_id' => 11
            ],
            [
                'name' => 'Ye',
                'state_id' => 11
            ],
            [
                'name' => 'Paung',
                'state_id' => 11
            ],
            [
                'name' => 'Kawhmu',
                'state_id' => 13
            ]

        ];
        Township::insert($states);
    }
}
