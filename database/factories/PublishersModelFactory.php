<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PublishersModel>
 */
class PublishersModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'publisher_id' => (string)Str::uuid(),
            'publisher_name' => fake()->word(),
            'publisher_desc' => fake()->text(150),
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now()
        ];
    }
}
