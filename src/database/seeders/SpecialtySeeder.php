<?php

namespace Database\Seeders;

use App\Models\Specialty;
use Illuminate\Database\Seeder;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Specialty::create([
            'name' => 'Albañilería',
        ]);
        
        Specialty::create([
            'name' => 'Pintura',
        ]);

        Specialty::create([
            'name' => 'Electricidad',
        ]);

        Specialty::create([
            'name' => 'Plomería',
        ]);
        
        Specialty::create([
            'name' => 'Diversos',
        ]);
    }
}
