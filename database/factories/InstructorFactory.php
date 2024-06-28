<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class InstructorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected static ?string $password;
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'role' => $this->faker->randomElement(['instructor', 'mentor']),
            'bio' => $this->faker->paragraph, // Generate a paragraph for the bio
            'phone' => $this->faker->phoneNumber,
            'salary' => $this->faker->randomFloat(2, 30000, 100000), // Generate random salary between 30000 and 100000 with two decimal places
            'status' => 1,
            'email_verified_at' => null,
            'remember_token' => Str::random(10),
            'major_id' => rand(1,10),
            'sub_major_id'=> 1,
            'sub_sub_major_id'=>1,
            'password' => static::$password ??= Hash::make('password'),
        ];
    }
}
