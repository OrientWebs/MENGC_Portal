<?php

namespace Database\Seeders;

use App\Models\NrcState;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NrcStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            ['id' => 1, 'code_en' => '1', 'code_mm' => '၁'],
            ['id' => 2, 'code_en' => '2', 'code_mm' => '၂'],
            ['id' => 3, 'code_en' => '3', 'code_mm' => '၃'],
            ['id' => 4, 'code_en' => '4', 'code_mm' => '၄'],
            ['id' => 5, 'code_en' => '5', 'code_mm' => '၅'],
            ['id' => 6, 'code_en' => '6', 'code_mm' => '၆'],
            ['id' => 7, 'code_en' => '7', 'code_mm' => '၇'],
            ['id' => 8, 'code_en' => '8', 'code_mm' => '၈'],
            ['id' => 9, 'code_en' => '9', 'code_mm' => '၉'],
            ['id' => 10, 'code_en' => '10', 'code_mm' => '၁၀'],
            ['id' => 11, 'code_en' => '11', 'code_mm' => '၁၁'],
            ['id' => 12, 'code_en' => '12', 'code_mm' => '၁၂'],
            ['id' => 13, 'code_en' => '13', 'code_mm' => '၁၃'],
            ['id' => 14, 'code_en' => '14', 'code_mm' => '၁၄'],
        ];

        NrcState::insert($states);
    }
}
