<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currencies =
        [
            [
                'codigo'        => 'PEN',
                'descripcion'   => 'NUEVO SOL',
                'pais'          => 'PERÚ',
                'simbolo'       => 'S/',
                'estado'        => 1
            ],
            [
                'codigo'        => 'USD',
                'descripcion'   => 'US DOLLAR',
                'pais'          => 'ESTADOS UNIDOS (EEUU)',
                'simbolo'       => '$',
                'estado'        => 1
            ],
            [
                'codigo'        => 'EUR',
                'descripcion'   => 'EURO',
                'pais'          => 'ESPAÑA',
                'simbolo'       => '€',
                'estado'        => 1
            ],
        ];

        foreach($currencies as $currency)
        {
            \App\Models\Currency::insert($currency);
        }

    }
}
