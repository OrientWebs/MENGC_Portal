<?php

namespace Database\Seeders;

use App\Models\NrcTownship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NrcTownshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $townships = [
            ['state_id' => 1, 'name_en' => 'AhGaYa', 'name_mm' => 'အဂယ'],
            ['state_id' => 1, 'name_en' => 'BaMaNa', 'name_mm' => 'ဗမန'],
            ['state_id' => 1, 'name_en' => 'DaHpaYa', 'name_mm' => 'ဒဖယ'],
            ['state_id' => 2, 'name_en' => 'BaLaKha', 'name_mm' => 'ဘလခ'],
            ['state_id' => 2, 'name_en' => 'DaMaSa', 'name_mm' => 'ဒမဆ'],
            ['state_id' => 12, 'name_en' => 'BaNyaNa', 'name_mm' => 'ဘညန'],
        ];

        NrcTownship::insert($townships);
    }
}
