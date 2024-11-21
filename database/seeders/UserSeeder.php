<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Ejecutar la siembra de la base de datos.
     *
     * @return void
     */
    public function run()
    {
        // Crear usuario Administrador
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@ejemplo.com',
            'password' => Hash::make('12345678'), // Cambiar por un password más seguro en producción
            'rol' => 'administrador',
            'is_frozen' => false,
        ]);

        // Crear usuario Docente
        User::create([
            'name' => 'Docente',
            'email' => 'docente@ejemplo.com',
            'password' => Hash::make('12345678'), // Cambiar por un password más seguro en producción
            'rol' => 'docente',
            'is_frozen' => false,
        ]);

        // Crear usuario Egresado
        User::create([
            'name' => 'Egresado',
            'email' => 'egresado@ejemplo.com',
            'password' => Hash::make('12345678'), // Cambiar por un password más seguro en producción
            'rol' => 'egresado',
            'is_frozen' => false,
        ]);
    }
}
