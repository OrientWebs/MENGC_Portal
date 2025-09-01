<?php

namespace Database\Seeders;

use App\Models\Ministry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MinistrySeeder extends Seeder
{
    public function run(): void
    {
        $ministries = [
            [
                'id'    => 1,
                'name' => 'Ministry of Transport and Communications',
            ],
            [
                'id'    => 2,
                'name' => 'Ministry of Defense',
            ],
            [
                'id'    => 3,
                'name' => 'Ministry of Home Affairs',
            ],
            [
                'id'    => 4,
                'name' => 'Ministry of Plannig and Finance',
            ],
            [
                'id'    => 5,
                'name' => 'Ministry of Foreign Affairs',
            ],
            [
                'id'    => 6,
                'name' => 'Ministry 1 at Office of Chairman of the State Administration Council',
            ],
            [
                'id'    => 7,
                'name' => 'Ministry 2 at Office of Chairman of the State Administration Council',
            ],
            [
                'id'    => 8,
                'name' => 'Ministry 3 at Office of Chairman of the State Administration Council',
            ],
            [
                'id'    => 9,
                'name' => 'Ministry 4 at Office of Chairman of the State Administration Council',
            ],
            [
                'id'    => 10,
                'name' => 'Ministry of Border Affairs',
            ],
            [
                'id'    => 11,
                'name' => 'Ministry of Investment and Foreign Economic Relations',
            ],
            [
                'id'    => 12,
                'name' => 'Ministry of Legal Affairs',
            ],
            [
                'id'    => 13,
                'name' => 'Ministry of Information',
            ],
            [
                'id'    => 14,
                'name' => 'Ministry of Religious Affairs and Culture',
            ],
            [
                'id'    => 15,
                'name' => 'Ministry of Agriculture,Livestock and Irrigation',
            ],
            [
                'id'    => 16,
                'name' => 'Ministry of Cooperatives and Rural Development',
            ],
            [
                'id'    => 17,
                'name' => 'Ministry of Natural Resources and Environmental Conservation',
            ],
            [
                'id'    => 18,
                'name' => 'Ministry of Electric Power',
            ],
            [
                'id'    => 19,
                'name' => 'Ministry of Energy',
            ],
            [
                'id'    => 20,
                'name' => 'Ministry of Industry',
            ],
            [
                'id'    => 21,
                'name' => 'Ministry of Immigration and Population',
            ],
            [
                'id'    => 22,
                'name' => 'Ministry of Labour',
            ],
            [
                'id'    => 23,
                'name' => 'Ministry of Commerce',
            ],
            [
                'id'    => 24,
                'name' => 'Ministry of Education',
            ],
            [
                'id'    => 25,
                'name' => 'Ministry of Science and Technology',
            ],
            [
                'id'    => 26,
                'name' => 'Ministry of Health',
            ],
            [
                'id'    => 27,
                'name' => 'Ministry of Sports and Youth Affairs',
            ],
            [
                'id'    => 28,
                'name' => 'Ministry of Construction',
            ],
            [
                'id'    => 29,
                'name' => 'Ministry of Social Welfare, Relief and Resettlement',
            ],
            [
                'id'    => 30,
                'name' => 'Ministry of Hotel and Tourism',
            ],
            [
                'id'    => 31,
                'name' => 'Ministry of Ethnic Affairs',
            ],

        ];
        Ministry::insert($ministries);
    }
}
