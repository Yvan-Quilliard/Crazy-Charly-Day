<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Theme;
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
        \App\Models\User::factory(20)->create();

         \App\Models\User::factory()->create([
             'name' => 'admin',
             'email' => 'admin@example.com',
             'password' => Hash::make('password'),
         ]);

        $this->call([
            ThemeSeeder::class,
            AtelierSeeder::class,
        ]);




    }
}
