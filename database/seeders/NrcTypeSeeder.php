<?php

namespace Database\Seeders;

use App\Models\NrcType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NrcTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['id' => 1, 'name_en' => 'P', 'name_mm' => 'ပြု'],
            ['id' => 2, 'name_en' => 'N', 'name_mm' => 'နိုင်'],
            ['id' => 3, 'name_en' => 'E', 'name_mm' => 'ဧည့်'],
        ];

        NrcType::insert($types);
    }
}
