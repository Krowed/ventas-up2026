<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries  =
        [
            [
                'codigo'        => 'PE',
                'descripcion'   => 'PERU',
                'estado'        => 1
            ]
        ];

        foreach($countries as $country)
        {
            \App\Models\Country::insert($country);
        }

    }
}
