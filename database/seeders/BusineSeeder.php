<?php

namespace Database\Seeders;

use App\Models\Business;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Business::insert([
            'ruc'                       => '20610316884',
            'razon_social'              => 'MYTEMS E.I.R.L.',
            'direccion'                 => 'JR MANCO CAPAC 452',
            'codigo_pais'               => 'PE',
            'ubigeo'                    => '220501',
            'telefono'                  => '950772205',
            'url_api'                   => 'https://facturacion.mytems.cloud/',
            'vencimiento_certificado'   => '2025-12-06',
            'urbanizacion'              => '',
            'local'                     => '',
            'nombre_comercial'          => 'MYTEMS E.I.R.L.',
            'usuario_sunat'             => 'MYTEMS23',
            'clave_sunat'               => 'Mytems23',
            'clave_certificado'         => 'mytems2022',
            'certificado'               => '20610316884.pfx',
            'servidor_sunat'            => 3,
            'instancia_wpp'             => 'NTE5NTA3NzIyMDU=',
            'logo'                      => 'logo.jpg',
            'pago'                      => 1
        ]);
    }
}
