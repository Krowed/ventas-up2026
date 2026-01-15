<?php

namespace Database\Seeders;

use App\Models\Warehouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Warehouse::create([
            'descripcion' => 'PRINCIPAL VENTAS',
            'detalle'     => 'Sucursal central',
            'direccion'   => 'Jr. Manco Capac 456'
        ]);

        Warehouse::create([
            'descripcion' => 'GALERIA #02',
            'detalle'     => 'Sucursal galeria 02',
            'direccion'   => 'Avenida Circunvalacion 677'
        ]);
    }
}
