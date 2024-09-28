<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CategoriesModel>
 */
class CategoriesModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => (string) Str::uuid(),
            'category_name' => fake()->word(),
            'category_desc' => fake()->text(150),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
