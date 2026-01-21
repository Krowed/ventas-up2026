<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserWarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Buscamos al usuario (asegúrate de que el ID exista)
        $user = User::find(1);

        // 2. Buscamos los almacenes que queremos asignarle
        // En este caso, le asignaremos los almacenes con ID 1 y 2
        $warehouses = [1, 2];
        if ($user) {
            // sync() es mejor que attach() en seeders porque evita duplicados
            // si corres el seeder varias veces.
            $user->warehouses()->sync($warehouses);
            
            $this->command->info("Almacenes asignados correctamente al usuario: {$user->nombres}");
        } else {
            $this->command->error("Usuario no encontrado.");
        }
    }
}
