<?php

namespace Database\Factories;

use App\Models\Theme;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Atelier>
 */
class AtelierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->words(3, true),
            'capacity' => fake()->numberBetween(5, 8),
            'date' => fake()->date,
            'theme_id' => Theme::all()->random()->id,
            'description' => fake()->words(5, true)
        ];
    }
}
