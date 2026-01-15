<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nombres'   => 'Administrador',
            'email'     => 'admin@mytems.cloud',
            'password'  => bcrypt('Mytems.2026')
        ]);
    }
}
