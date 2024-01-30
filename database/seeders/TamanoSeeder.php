<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tamano;

class TamanoSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     */
    public function run(): void
    {
        Tamano::create([
            'name' => 'Grande',
        ]);

        Tamano::create([
            'name' => 'Mediana',
        ]);
        
        Tamano::create([
            'name' => 'Pequeña',
        ]);

    }
}
