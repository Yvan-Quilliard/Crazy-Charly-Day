<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Atelier;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(20)->create()->each(function ($user){

        });

         \App\Models\User::factory()->create([
             'name' => 'admin',
             'email' => 'admin@example.com',
             'password' => Hash::make('password'),
         ])->each(function ($user){
             $atelierDemande = Atelier::factory()->create();
             $user->demands2ateliers()->attach($atelierDemande);
             $atelierRefused = Atelier::factory()->create();
             $user->demandsRefused()->attach($atelierRefused);
         });

        $this->call([
            ThemeSeeder::class,
            AtelierSeeder::class,
        ]);




    }
}
