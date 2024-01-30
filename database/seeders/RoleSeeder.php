<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     */
    public function run(): void
    {
        Role::create([
            'name' => 'super admin',
            'description' => 'El administrador de la aplicación, puede gestionar cualquier usuario, empresa y roles',
        ]);

        Role::create([
            'name' => 'administrador',
            'description' => 'El usuario con el que se registró la empresa, puede gestionar sus usuarios y sus roles'
        ]);

        Role::create([
            'name' => 'dueno',
            'description' => 'se visualizacion limitada para dueño de los cachorros',
        ]);

    }
}
