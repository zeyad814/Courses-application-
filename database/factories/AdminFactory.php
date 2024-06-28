<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    protected static ?string $password;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail, // Uses Faker's safeEmail for enhanced security
            'role' => $this->faker->randomElement(['employee', 'manager', 'admin']), // Include potential roles
            'salary_deductions' => $this->faker->randomFloat(2, 0, 1000), // Random deductions within range
            'profits' => $this->faker->randomFloat(2, 0, 5000), // Random profits within range
            'final_salary' => $this->faker->randomFloat(2, 0, 500), // Set null for calculation later
            'working_place' => $this->faker->country, // Random location option
            'status' => 1,
            'email_verified_at' => null,
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }
}
