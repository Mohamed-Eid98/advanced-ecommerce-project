<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$E3xppgL9zYiFZaF4i5zjm.TTK6XIwtl9tiO4svqiSJMKRDQ6nzZ6S',  // 123456789
            'remember_token' => Str::random(10),
            'current_team_id' => null,
        ];
    }
}
