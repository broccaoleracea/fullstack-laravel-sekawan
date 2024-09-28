<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LibraryUsersModel>
 */
class LibraryUsersModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'library-user_id'=> (string) Str::uuid(),
            'library-user_firstname'=> fake()->firstName(),
            'library-user_lastname'=> fake()->lastName(),
            'library-user_username'=> fake()->userName(),
            'library-user_email' => fake()->email(),
            'library-user_password'=>fake()->password(),
            'library-user_isAdmin'=>fake()->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
