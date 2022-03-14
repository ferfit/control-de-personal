<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'fernando',
            'email' => 'ferfit16@gmail.com',
            'password' => hash::make('laesquina'),
            'rol' => 'administrador'
        ]);
        $user = User::create([
            'name' => 'Victoria',
            'email' => 'socio@correo.com',
            'password' => hash::make('laesquina'),
            'rol' => 'socio',

        ]);
        $user = User::create([
            'name' => 'Sofia',
            'email' => 'empleado@gmail.com',
            'password' => hash::make('laesquina'),
            'rol' => 'empleado'
        ]);
        $user = User::create([
            'name' => 'Tobi',
            'email' => 'tobi@gmail.com',
            'password' => hash::make('laesquina'),
            'rol' => 'empleado'
        ]);
    }
}
