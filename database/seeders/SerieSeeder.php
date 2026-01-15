<?php

namespace Database\Seeders;

use App\Models\Serie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SerieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Serie::create([
            'serie'                         => 'F001',
            'correlativo'                   => '00000001',
            'idtipo_documento'              => 1,
            'idcaja'                        => 1,
            'direccion'                     => NULL
        ]);

        Serie::create([
            'serie'                         => 'B001',
            'correlativo'                   => '00000001',
            'idtipo_documento'              => 2,
            'idcaja'                        => 1,
            'direccion'                     => NULL
        ]);

        Serie::create([
            'serie'                         => 'BC01',
            'correlativo'                   => '00000001',
            'idtipo_documento'              => 6,
            'idtipo_documento_relacionado'  => 2,
            'idcaja'                        => 1,
            'direccion'                     => NULL
        ]);

        Serie::create([
            'serie'                         => 'FC01',
            'correlativo'                   => '00000001',
            'idtipo_documento'              => 6,
            'idtipo_documento_relacionado'  => 1,
            'idcaja'                        => 1,
            'direccion'                     => NULL
        ]);

        Serie::create([
            'serie'                         => 'NV01',
            'correlativo'                   => '00000001',
            'idtipo_documento'              => 7,
            'idcaja'                        => 1,
            'direccion'                     => NULL
        ]);

        Serie::create([
            'serie'                         => 'B002',
            'correlativo'                   => '00000001',
            'idtipo_documento'              => 2,
            'idcaja'                        => 2,
            'direccion'                     => NULL
        ]);

        Serie::create([
            'serie'                         => 'BC02',
            'correlativo'                   => '00000001',
            'idtipo_documento'              => 6,
            'idtipo_documento_relacionado'  => 2,
            'idcaja'                        => 2,
            'direccion'                     => NULL
        ]);

        Serie::create([
            'serie'                         => 'FC02',
            'correlativo'                   => '00000001',
            'idtipo_documento'              => 6,
            'idtipo_documento_relacionado'  => 1,
            'idcaja'                        => 2,
            'direccion'                     => NULL
        ]);

        Serie::create([
            'serie'                         => 'NV02',
            'correlativo'                   => '00000001',
            'idtipo_documento'              => 7,
            'idcaja'                        => 2,
            'direccion'                     => NULL
        ]);

        Serie::create([
            'serie'                         => 'F201',
            'correlativo'                   => '00000001',
            'idtipo_documento'              => 1,
            'idcaja'                        => 3,
            'direccion'                     => NULL
        ]);

        Serie::create([
            'serie'                         => 'B201',
            'correlativo'                   => '00000001',
            'idtipo_documento'              => 2,
            'idcaja'                        => 3,
            'direccion'                     => NULL
        ]);

        Serie::create([
            'serie'                         => 'BC03',
            'correlativo'                   => '00000001',
            'idtipo_documento'              => 6,
            'idtipo_documento_relacionado'  => 2,
            'idcaja'                        => 3,
            'direccion'                     => NULL
        ]);

        Serie::create([
            'serie'                         => 'FC03',
            'correlativo'                   => '00000001',
            'idtipo_documento'              => 6,
            'idtipo_documento_relacionado'  => 1,
            'idcaja'                        => 3,
            'direccion'                     => NULL
        ]);

        Serie::create([
            'serie'                         => 'NV03',
            'correlativo'                   => '00000001',
            'idtipo_documento'              => 7,
            'idcaja'                        => 3,
            'direccion'                     => NULL
        ]);
    }
}
