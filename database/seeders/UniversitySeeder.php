<?php

namespace Database\Seeders;

use App\Models\University;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder
{
    public function run(): void
    {
        $universities = [
            [
                'id'    => '1',
                'name'  => 'TU(Mhawbi)',
            ],
            [
                'id'    => '2',
                'name'  => 'YTU',
            ],
            [
                'id'    => '3',
                'name'  => 'MTU',
            ],
            [
                'id'    => '4',
                'name'  => 'WYTU',
            ],
            [
                'id'    => '5',
                'name'  => 'TU (Thanlyin)',
            ],
            [
                'id'    => '6',
                'name'  => 'TU (Yamaethin)',
            ],
            [
                'id'    => '7',
                'name'  => 'TU (Lashio)',
            ],
            [
                'id'    => '8',
                'name'  => 'TU (Taunggyi)',
            ],
            [
                'id'    => '9',
                'name'  => 'TU (KyaingTong)',
            ],
            [
                'id'    => '10',
                'name'  => 'TU (Pinlon)',
            ],
            [
                'id'    => '11',
                'name'  => 'TU (Loikaw)',
            ],
            [
                'id'    => '12',
                'name'  => 'TU (Monywa)',
            ],
            [
                'id'    => '13',
                'name'  => 'TU (Kalay)',
            ],
            [
                'id'    => '14',
                'name'  => 'TU (Pakokku)',
            ],
            [
                'id'    => '15',
                'name'  => 'TU (Magway)',
            ],
            [
                'id'    => '16',
                'name'  => 'TU (Taungoo)',
            ],
            [
                'id'    => '17',
                'name'  => 'TU (Sittwe)',
            ],
            [
                'id'    => '18',
                'name'  => 'TU (Hinthada)',
            ],
            [
                'id'    => '19',
                'name'  => 'TU (Pathein)',
            ],
            [
                'id'    => '20',
                'name'  => 'TU (Maubin)',
            ],
            [
                'id'    => '21',
                'name'  => 'TU (Mandalay)',
            ],
            [
                'id'    => '22',
                'name'  => 'TU (Banmaw)',
            ],
            [
                'id'    => '23',
                'name'  => 'TU (Hpa-an)',
            ],
            [
                'id'    => '24',
                'name'  => 'TU (Mawlamyine)',
            ],
            [
                'id'    => '25',
                'name'  => 'TU (Dawei)',
            ],
            [
                'id'    => '26',
                'name'  => 'TU (Myeik)',
            ],
            [
                'id'    => '27',
                'name'  => 'TU (YCC)',
            ],
            [
                'id'    => '28',
                'name'  => 'TU (Sagaing)',
            ],
            [
                'id'    => '29',
                'name'  => 'TU(Myitkyina)',
            ],
            [
                'id'    => '30',
                'name'  => 'TU (Kyaukse)'
            ],
            [
                'id'    => '31',
                'name'  => 'TU (Meiktila)',
            ],
            [
                'id'    => '32',
                'name'  => 'MAEU',
            ],
            [
                'id'    => '33',
                'name'  => 'MMU',
            ],
            [
                'id'    => '34',
                'name'  => 'DSTA',
            ],
            [
                'id'    => '35',
                'name'  => 'GTI (Yenangyaung)',
            ],
            [
                'id'    => '36',
                'name'  => 'GTI (Insein)',
            ],
            [
                'id'    => '37',
                'name'  => 'TU (ShweBo)',
            ],
            [
                'id'    => '38',
                'name'  => 'TU (Pyay)',
            ],
            [
                'id'    => '39',
                'name'  => 'TU (Hlaing Thar Yar)',
            ],
            [
                'id'    => '40',
                'name'  => 'RIT',
            ],
            [
                'id'    => '41',
                'name'  => 'GTI (Chauk)',
            ],
            [
                'id'    => '42',
                'name'  => 'GTI (Mawlamyine)',
            ],
            [
                'id'    => '43',
                'name'  => 'GTI (Yamethin)',
            ],
            [
                'id'    => '44',
                'name'  => 'GTI (Taungoo)',
            ],
            [
                'id'    => '45',
                'name'  => 'GTC (Taungoo)',
            ],
            [
                'id'    => '46',
                'name'  => 'GTI (Kyaing Tong)',
            ],
            [
                'id'    => '47',
                'name'  => 'GTC (Myingyan)',
            ],
            [
                'id'    => '48',
                'name'  => 'GTC (Hinthata)',
            ],
            [
                'id'    => '49',
                'name'  => 'GTC (Kyaukse)',
            ],
            [
                'id'    => '50',
                'name'  => 'GTC (Hmawbi)',
            ],
            [
                'id'    => '51',
                'name'  => 'GTC (Yamaethin)',
            ],
            [
                'id'    => '52',
                'name'  => 'TU (Ayetharyar)',
            ],
            [
                'id'    => '53',
                'name'  => 'GTI (Thandwe)',
            ],
            [
                'id'    => '54',
                'name'  => 'GTC (Shwe Bo)',
            ],
            [
                'id'    => '55',
                'name'  => 'GTC (Meiktila)',
            ],
            [
                'id'    => '56',
                'name'  => 'GTI (Taungoo)',
            ],
            [
                'id'    => '57',
                'name'  => 'GTI (Thanlyin)',
            ],
            [
                'id'    => '58',
                'name'  => 'GTI (Moulmein)',
            ],
            [
                'id'    => '59',
                'name'  => 'GTI (Wakema)',
            ],
            [
                'id'    => '60',
                'name'  => 'GTC (Pyay)',
            ],
            [
                'id'    => '61',
                'name'  => 'GTI (Aye Thar Yar)',
            ],
            [
                'id'    => '62',
                'name'  => 'GTI (Meiktila)',
            ],
            [
                'id'    => '63',
                'name'  => 'GTC (Mohnyin)',
            ],
            [
                'id'    => '64',
                'name'  => 'GTC (Mandalay)',
            ],
            [
                'id'    => '65',
                'name'  => 'TU (Toungoo)',
            ],
            [
                'id'    => '66',
                'name'  => 'GTI (Prome)',
            ],
            [
                'id'    => '67',
                'name'  => 'GTI (Mandalay)',
            ],
            [
                'id'    => '68',
                'name'  => 'GTI (Kyaukpadaung)',
            ],
            [
                'id'    => '69',
                'name'  => 'TU (Toungoo)',
            ],
            [
                'id'    => '70',
                'name'  => 'TU (Myingyan)',
            ],
            [
                'id'    => '71',
                'name'  => 'GTC (Monywa)',
            ],
            [
                'id'    => '72',
                'name'  => 'TU (Hmawbi)',
            ],
            [
                'id'    => '73',
                'name'  => 'GTI (Hlaing Thar Yar)',
            ],
            [
                'id'    => '74',
                'name'  => 'GTI (Gangaw)',
            ],
            [
                'id'    => '75',
                'name'  => 'GTI (Pyay)',
            ],
            [
                'id'    => '76',
                'name'  => 'GTI (Hinthada)',
            ],
            [
                'id'    => '77',
                'name'  => 'GTC (Maubin)',
            ],
            [
                'id'    => '78',
                'name'  => 'GTI (Gangaw)',
            ],
            [
                'id'    => '79',
                'name'  => 'GTC (Pathein)',
            ],
            [
                'id'    => '80',
                'name'  => 'YIT',
            ],
            [
                'id'    => '81',
                'name'  => 'GTC (Ayetharyar)',
            ],
            [
                'id'    => '82',
                'name'  => 'TU (Hinthata)',
            ],
            [
                'id'    => '83',
                'name'  => 'GTC (Kyaing Tong)',
            ],
            [
                'id'    => '84',
                'name'  => 'GTI (Myitkyina)',
            ],
            [
                'id'    => '85',
                'name'  => 'GTC (Lashio)',
            ],
            [
                'id'    => '86',
                'name'  => 'GTI (Thayet)',
            ],
            [
                'id'    => '87',
                'name'  => 'GTC (Mawlamyine)',
            ],
            [
                'id'    => '88',
                'name'  => 'GTI (Sagaing)',
            ],
            [
                'id'    => '89',
                'name'  => 'GTI (Yangon)',
            ],
            [
                'id'    => '90',
                'name'  => 'GTI (Kalay)',
            ],
            [
                'id'    => '91',
                'name'  => 'TU (Hmawbi)',
            ],
            [
                'id'    => '92',
                'name'  => 'GTI (Kantbalu)',
            ],
            [
                'id'    => '93',
                'name'  => 'GTI (Pyin Oo Lwin)',
            ],
            [
                'id'    => '94',
                'name'  => 'GTC (Thanlyin)',
            ],
            [
                'id'    => '95',
                'name'  => 'TU (Yatanarpon Cyber City)',
            ],
            [
                'id'    => '96',
                'name'  => 'TU (Panglong)',
            ],
            [
                'id'    => '97',
                'name'  => 'GTI (Kyaukse)',
            ],
            [
                'id'    => '98',
                'name'  => 'TU (Sittwe)',
            ],
            [
                'id'    => '99',
                'name'  => 'GTC (Pakokku)',
            ],
            [
                'id'    => '100',
                'name'  => 'GTI (Mandalay)',
            ],
            [
                'id'    => '101',
                'name'  => 'The University Of Leeds',
            ],
            [
                'id'    => '102',
                'name'  => 'The University Of Newcastle',
            ],
            [
                'id'    => '103',
                'name'  => 'PTU',
            ],
            [
                'id'    => '104',
                'name'  => 'GTC (Magway)',
            ],
            [
                'id'    => '105',
                'name'  => 'GTI (Kalaw)',
            ],
            [
                'id'    => '106',
                'name'  => 'National University Of Singapore',
            ],
            [
                'id'    => '107',
                'name'  => 'Military Technological College',
            ],
            [
                'id'    => '108',
                'name'  => 'GTI (Pyay)',
            ],
            [
                'id'    => '109',
                'name'  => 'GTI (Pyin Oo Lwin)',
            ],
            [
                'id'    => '110',
                'name'  => 'GTI (Maubin)',
            ],
            [
                'id'    => '111',
                'name'  => 'GTI (KHAMTI)',
            ],
            [
                'id'    => '112',
                'name'  => 'GTI (Thanlyin)',
            ],
            [
                'id'    => '113',
                'name'  => 'GTC (Sittwe)',
            ],
            [
                'id'    => '114',
                'name'  => 'GTI (Monywa)',
            ],
            [
                'id'    => '115',
                'name'  => 'University Of Ottawa',
            ],
            [
                'id'    => '116',
                'name'  => 'GTC (Myitkyina)',
            ],
            [
                'id'    => '117',
                'name'  => 'GTI (Hmawbi)',
            ],
            [
                'id'    => '118',
                'name'  => 'GTC (Hpa-An)',
            ],
            [
                'id'    => '119',
                'name'  => 'GTI (Loikaw)',
            ],
            [
                'id'    => '120',
                'name'  => 'Nationalities Youth Resource Development Degree College (Sagaing)',
            ],
            [
                'id'    => '121',
                'name'  => 'GTI (Putao)',
            ],
            [
                'id'    => '122',
                'name'  => 'Soe Thein',
            ],
            [
                'id'    => '123',
                'name'  => 'Other',
            ],

        ];
        University::insert($universities);
    }
}
