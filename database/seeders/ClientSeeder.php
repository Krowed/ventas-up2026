<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
    */
    public function run(): void
    {
        Client::insert([
            'iddoc'         => 1,
            'dni_ruc'       => '00000000',
            'nombres'       => 'CLIENTES VARIOS',
            'direccion'     => '-',
            'codigo_pais'   => 'PE',
            'ubigeo'        => '220901'
        ]);
    }
}