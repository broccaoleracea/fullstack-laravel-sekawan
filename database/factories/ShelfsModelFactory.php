<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShelfsModel>
 */
class ShelfsModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'shelf_id' => (string) Str::uuid(),
                'shelf_name' => fake()->word(),
                'shelf_position' => fake()->word(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        ];
    }
}
