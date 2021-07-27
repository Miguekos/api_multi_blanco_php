<?php

namespace Database\Seeders;

use App\Models\AssigmentStatus;
use Illuminate\Database\Seeder;

class AssigmentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       AssigmentStatus::create([
            'name' => 'No Asignado',
        ]);
        
        AssigmentStatus::create([
            'name' => 'Asignado',
        ]);
    }
}
