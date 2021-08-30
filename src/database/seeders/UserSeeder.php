<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'              => 'Admin',
            'email'             => 'admin@gmail.com',
            'password'          => bcrypt(123456),  
            'email_verified_at' => now(),
            'remember_token'    => Str::random(60),
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'name'              => 'Processor',
            'email'             => 'processor@gmail.com',
            'password'          => bcrypt(123456),  
            'email_verified_at' => now(),
            'remember_token'    => Str::random(60),
        ]);
        $user->assignRole('processor');

        $user = User::create([
            'name'              => 'Roberto',
            'email'             => 'roberto@gmail.com',
            'password'          => bcrypt(123456),
            'colorPair'         => '{"dark": "rgb(11, 209, 171,0.8)","light": "rgb(11, 209, 171,0.1)"}',
            'email_verified_at' => now(),
            'remember_token'    => Str::random(60),
        ]);
        $user->assignRole('operator');
        $user->specialties()->attach([1, 2, 3, 4, 5]);

        $user = User::create([
            'name'              => 'Santiago',
            'email'             => 'santiago@gmail.com',
            'password'          => bcrypt(123456),  
            'email_verified_at' => now(),
            'colorPair'         => '{"dark": "rgb(11, 209, 171,0.8)","light": "rgb(11, 209, 171,0.1)"}',
            'remember_token'    => Str::random(60),
        ]);
        $user->assignRole('operator');
        $user->specialties()->attach([1, 2, 3, 4, 5]);

        $user = User::create([
            'name'              => 'Piter',
            'email'             => 'piter@gmail.com',
            'password'          => bcrypt(123456),  
            'email_verified_at' => now(),
            'colorPair'         => '{"dark": "rgb(11, 209, 171,0.8)","light": "rgb(11, 209, 171,0.1)"}',
            'remember_token'    => Str::random(60),
        ]);
        $user->assignRole('operator');
        $user->specialties()->attach([1, 2, 3, 4, 5]);

        $user = User::create([
            'name'              => 'Julio',
            'email'             => 'julio@gmail.com',
            'password'          => bcrypt(123456),  
            'email_verified_at' => now(),
            'colorPair'         => '{"dark": "rgb(11, 209, 171,0.8)","light": "rgb(11, 209, 171,0.1)"}',
            'remember_token'    => Str::random(60),
        ]);
        $user->assignRole('operator');
        $user->specialties()->attach([1, 2, 3, 4, 5]);

        $user = User::create([
            'name'              => 'Junior',
            'email'             => 'junior@gmail.com',
            'password'          => bcrypt(123456),  
            'email_verified_at' => now(),
            'colorPair'         => '{"dark": "rgb(11, 209, 171,0.8)","light": "rgb(11, 209, 171,0.1)"}',
            'remember_token'    => Str::random(60),
        ]);
        $user->assignRole('operator');
        $user->specialties()->attach([1, 2, 3, 4, 5]);

        $user = User::create([
            'name'              => 'Fabian', 
            'email'             => 'fabian@gmail.com',
            'password'          => bcrypt(123456),  
            'email_verified_at' => now(),
            'colorPair'         => '{"dark": "rgb(11, 209, 171,0.8)","light": "rgb(11, 209, 171,0.1)"}',
            'remember_token'    => Str::random(60),
        ]);
        $user->assignRole('operator');
        $user->specialties()->attach([1, 2, 3, 4, 5]);


        $user = User::create([
            'name'              => 'Larry',
            'email'             => 'larry@gmail.com',
            'password'          => bcrypt(123456),  
            'email_verified_at' => now(),
            'colorPair'         => '{"dark": "rgb(11, 209, 171,0.8)","light": "rgb(11, 209, 171,0.1)"}',
            'remember_token'    => Str::random(60),
        ]);
        $user->assignRole('operator');
        $user->specialties()->attach([1, 2, 3, 4, 5]);
    }
}
