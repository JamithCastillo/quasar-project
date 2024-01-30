<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(1)->create();
        User::create([
            'id'=> '1',
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'movil' => '',
            'company' => '',
            'telefono' => '',
            'password' => Hash::make('admin'),

            'email_verified_at' => now(),

        ]);
    }
}
