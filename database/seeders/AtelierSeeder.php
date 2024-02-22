<?php

namespace Database\Seeders;

use App\Models\Atelier;
use App\Models\User;
use App\Models\User2Atelier;
use Database\Factories\User2AtelierFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AtelierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Atelier::factory(20)->create()->each(function ($atelier) {
            $user = User::inRandomOrder()->first();
            $atelier->users()->attach($user);
        });

    }
}
