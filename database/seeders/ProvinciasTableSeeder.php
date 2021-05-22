<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProvinciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provincias = [
            [
                'id' => 1,
                'codigo' => 'AL',
                'nombre' => 'Alabama'
            ],
            [
                'id' => 2,
                'codigo' => 'AK',
                'nombre' => 'Alaska'
            ],
            [
                'id' => 3,
                'codigo' => 'AZ',
                'nombre' => 'Arizona'
            ],
            [
                'id' => 4,
                'codigo' => 'AR',
                'nombre' => 'Arkansas'
            ],
            [
                'id' => 5,
                'codigo' => 'CA',
                'nombre' => 'California'
            ],
            [
                'id' => 6,
                'codigo' => 'CO',
                'nombre' => 'Colorado'
            ],
            [
                'id' => 7,
                'codigo' => 'CT',
                'nombre' => 'Connecticut'
            ],
            [
                'id' => 8,
                'codigo' => 'DE',
                'nombre' => 'Delaware'
            ],
            [
                'id' => 9,
                'codigo' => 'DC',
                'nombre' => 'District of Columbia'
            ],
            [
                'id' => 10,
                'codigo' => 'FL',
                'nombre' => 'Florida'
            ],
            [
                'id' => 11,
                'codigo' => 'GA',
                'nombre' => 'Georgia'
            ],
            [
                'id' => 12,
                'codigo' => 'HI',
                'nombre' => 'Hawaii'
            ],
            [
                'id' => 13,
                'codigo' => 'ID',
                'nombre' => 'Idaho'
            ],
            [
                'id' => 14,
                'codigo' => 'IL',
                'nombre' => 'Illinois'
            ],
            [
                'id' => 15,
                'codigo' => 'IN',
                'nombre' => 'Indiana'
            ],
            [
                'id' => 16,
                'codigo' => 'IA',
                'nombre' => 'Iowa'
            ],
            [
                'id' => 17,
                'codigo' => 'KS',
                'nombre' => 'Kansas'
            ],
            [
                'id' => 18,
                'codigo' => 'KY',
                'nombre' => 'Kentucky'
            ],
            [
                'id' => 19,
                'codigo' => 'LA',
                'nombre' => 'Louisiana'
            ],
            [
                'id' => 20,
                'codigo' => 'ME',
                'nombre' => 'Maine'
            ],
            [
                'id' => 21,
                'codigo' => 'MD',
                'nombre' => 'Maryland'
            ],
            [
                'id' => 22,
                'codigo' => 'MA',
                'nombre' => 'Massachusetts'
            ],
            [
                'id' => 23,
                'codigo' => 'MI',
                'nombre' => 'Michigan'
            ],
            [
                'id' => 24,
                'codigo' => 'MN',
                'nombre' => 'Minnesota'
            ],
            [
                'id' => 25,
                'codigo' => 'MS',
                'nombre' => 'Mississippi'
            ],
            [
                'id' => 26,
                'codigo' => 'MO',
                'nombre' => 'Missouri'
            ],
            [
                'id' => 27,
                'codigo' => 'MT',
                'nombre' => 'Montana'
            ],
            [
                'id' => 28,
                'codigo' => 'NE',
                'nombre' => 'Nebraska'
            ],
            [
                'id' => 29,
                'codigo' => 'NV',
                'nombre' => 'Nevada'
            ],
            [
                'id' => 30,
                'codigo' => 'NH',
                'nombre' => 'New Hampshire'
            ],
            [
                'id' => 31,
                'codigo' => 'NJ',
                'nombre' => 'New Jersey'
            ],
            [
                'id' => 32,
                'codigo' => 'NM',
                'nombre' => 'New Mexico'
            ],
            [
                'id' => 33,
                'codigo' => 'NY',
                'nombre' => 'New York'
            ],
            [
                'id' => 34,
                'codigo' => 'NC',
                'nombre' => 'North Carolina'
            ],
            [
                'id' => 35,
                'codigo' => 'ND',
                'nombre' => 'North Dakota'
            ],
            [
                'id' => 36,
                'codigo' => 'OH',
                'nombre' => 'Ohio'
            ],
            [
                'id' => 37,
                'codigo' => 'OK',
                'nombre' => 'Oklahoma'
            ],
            [
                'id' => 38,
                'codigo' => 'OR',
                'nombre' => 'Oregon'
            ],
            [
                'id' => 39,
                'codigo' => 'PA',
                'nombre' => 'Pennsylvania'
            ],
            [
                'id' => 40,
                'codigo' => 'PR',
                'nombre' => 'Puerto Rico'
            ],
            [
                'id' => 41,
                'codigo' => 'RI',
                'nombre' => 'Rhode Island'
            ],
            [
                'id' => 42,
                'codigo' => 'SC',
                'nombre' => 'South Carolina'
            ],
            [
                'id' => 43,
                'codigo' => 'SD',
                'nombre' => 'South Dakota'
            ],
            [
                'id' => 44,
                'codigo' => 'TN',
                'nombre' => 'Tennessee'
            ],
            [
                'id' => 45,
                'codigo' => 'TX',
                'nombre' => 'Texas'
            ],
            [
                'id' => 46,
                'codigo' => 'UT',
                'nombre' => 'Utah'
            ],
            [
                'id' => 47,
                'codigo' => 'VT',
                'nombre' => 'Vermont'
            ],
            [
                'id' => 48,
                'codigo' => 'VA',
                'nombre' => 'Virginia'
            ],
            [
                'id' => 49,
                'codigo' => 'WA',
                'nombre' => 'Washington'
            ],
            [
                'id' => 50,
                'codigo' => 'WV',
                'nombre' => 'West Virginia'
            ],
            [
                'id' => 51,
                'codigo' => 'WI',
                'nombre' => 'Wisconsin'
            ],
            [
                'id' => 52,
                'codigo' => 'WY',
                'nombre' => 'Wyoming'
            ]
        ];

        State::insert($provincias);
    }
}
