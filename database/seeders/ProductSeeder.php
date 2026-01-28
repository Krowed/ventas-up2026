<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Limpieza total para evitar duplicados
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('products')->truncate();
        DB::table('stock_products')->truncate();

        $now = Carbon::now();

        // 2. Definición de 10 productos/servicios mixtos
        $items = [
            // PRODUCTOS (opcion 1)
            ['cod' => 'P-001', 'desc' => 'iPhone 15 Pro Max 256GB - Titanium', 'op' => 1, 'stock' => 15, 'compra' => 4100, 'venta' => 5299],
            ['cod' => 'P-002', 'desc' => 'MacBook Air M3 13" 8/256GB - Space Gray', 'op' => 1, 'stock' => 8, 'compra' => 3700, 'venta' => 4599],
            ['cod' => 'P-003', 'desc' => 'Samsung Galaxy S24 Ultra - Titanium Gray', 'op' => 1, 'stock' => 12, 'compra' => 3800, 'venta' => 4850],
            ['cod' => 'P-004', 'desc' => 'Xiaomi Redmi Note 13 Pro+ 5G - Black', 'op' => 1, 'stock' => 30, 'compra' => 1350, 'venta' => 1899],
            ['cod' => 'P-005', 'desc' => 'AirPods Pro (2nd Gen) USB-C', 'op' => 1, 'stock' => 45, 'compra' => 720, 'venta' => 999],
            ['cod' => 'P-006', 'desc' => 'iPad Air M2 11" 128GB - Blue', 'op' => 1, 'stock' => 10, 'compra' => 2200, 'venta' => 2899],
            ['cod' => 'P-007', 'desc' => 'Sony WH-1000XM5 Noise Canceling', 'op' => 1, 'stock' => 20, 'compra' => 950, 'venta' => 1350],
            ['cod' => 'P-008', 'desc' => 'Apple Watch Series 9 GPS 45mm', 'op' => 1, 'stock' => 18, 'compra' => 1400, 'venta' => 1950],

            // SERVICIOS (opcion 2) - Stock irá nulo en la tabla de stock_products
            ['cod' => 'S-001', 'desc' => 'Mantenimiento Preventivo Laptop Pro', 'op' => 2, 'stock' => null, 'compra' => 0, 'venta' => 120],
            ['cod' => 'S-002', 'desc' => 'Soporte Técnico Especializado (Hora)', 'op' => 2, 'stock' => null, 'compra' => 0, 'venta' => 80],
            ['cod' => 'S-003', 'desc' => 'Soporte Preventivo', 'op' => 2, 'stock' => null, 'compra' => 0, 'venta' => 60]
        ];

        // 3. Inserción en ambas tablas
        foreach ($items as $item) {
            // Insertar en tabla PRODUCTS
            $productId = DB::table('products')->insertGetId([
                'codigo_interno'    => $item['cod'],
                'codigo_barras'     => $item['op'] == 1 ? '750' . rand(1111111, 9999999) : null,
                'codigo_sunat'      => '00000000',
                'descripcion'       => $item['desc'],
                'idmarca'           => 1,
                'idcategoria'       => 1,
                'idunidad'          => 46,
                'idcodigo_igv'      => 10,
                'igv'               => 0,
                'precio_compra'     => $item['compra'],
                'precio_venta'      => $item['venta'],
                'impuesto'          => 0,
                'fecha_vencimiento' => null,
                'opcion'            => $item['op'],
                'stock_actual'      => $item['stock'],
                'imagen'            => null, // Puedes setear una imagen por defecto luego
                'created_at'        => $now,
                'updated_at'        => $now,
            ]);

            // Insertar SIEMPRE en STOCK_PRODUCTS (sea producto o servicio)
            DB::table('stock_products')->insert([
                'idproducto'     => $productId,
                'idalmacen'      => 1,
                'stock_minimo'   => $item['op'] == 1 ? 10 : null, // Mínimo solo para productos
                'stock_actual'   => $item['stock'],               // Irá null si es servicio
                'stock_entrada'  => $item['stock'],               // Irá null si es servicio
                'precio_compra'  => $item['compra'],
                'precio_venta'   => $item['venta'],
                'fecha_registro' => $now->format('Y-m-d'),
                'created_at'     => $now,
                'updated_at'     => $now,
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
