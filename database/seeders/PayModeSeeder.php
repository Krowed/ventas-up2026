<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PayModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pay_modes     =
        [
            ['descripcion'             => 'Efectivo'],
            ['descripcion'             => 'Yape'],
            ['descripcion'             => 'Plin'],
            ['descripcion'             => 'Tunki'],
            ['descripcion'             => 'Tarjeta de crédito'],
            ['descripcion'             => 'Tarjeta de débito'],
            ['descripcion'             => 'Transferencia'],
            ['descripcion'             => 'Cheque'],
        ];

        foreach($pay_modes as $pay_mode)
        {
            \App\Models\PayMode::insert($pay_mode);
        }

    }
}
