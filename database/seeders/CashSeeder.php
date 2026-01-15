<?php

namespace Database\Seeders;

use App\Models\Cash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CashSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cash::create([
            'descripcion'   => 'CAJA 1',
            'warehouse_id'  => 1
        ]);

        Cash::create([
            'descripcion'   => 'CAJA 2',
            'warehouse_id'  => 1
        ]);

        Cash::create([
            'descripcion'   => 'CAJA 1',
            'warehouse_id'  => 2
        ]);

        Cash::create([
            'descripcion'   => 'CAJA 2',
            'warehouse_id'  => 2
        ]);
    }
}
