<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // TO DO AJOUTER LE BON MODELE
        Theme::insert([
            ['name' => 'IT', 'label' => 'cuisine italienne'],
            ['name' => 'FR', 'label' => 'cuisine française'],
            ['name' => 'MEX', 'label' => 'cuisine Amérique du Sud'],
            ['name' => 'JP', 'label' => 'cuisine japonaise'],
            ['name' => 'GR', 'label' => 'cuisine grecque'],
            ['name' => 'OR', 'label' => 'cuisine orientale'],
        ]);
    }
}
