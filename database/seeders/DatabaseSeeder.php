<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Ejecutar los seeders de la base de datos.
     *
     * @return void
     */
    public function run()
    {
        // Llamar al seeder de roles
        $this->call(UserSeeder::class);
    }
}
