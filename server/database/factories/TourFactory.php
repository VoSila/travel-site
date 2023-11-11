<?php

namespace Database\Factories;

use App\Models\Tour;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Tour>
 */
class TourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'places' => 12,
            'image' => fake()->image('storage/app/public/tours'),
            'coordinates' => '[53.90280068233724,27.561111023225713]',
            'time' => fake()->time(),
            'title' => fake()->name(),
            'preview' => fake()->text(100),
            'description' => fake()->text(650),
            'date' => fake()->date(),
            'prise' => fake()->numerify(),
            'best' => 1
        ];
    }
}
