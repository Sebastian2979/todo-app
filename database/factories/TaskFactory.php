<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=> fake()->sentence(),
            'description'=> fake()->sentence(),
            'is_completed'=> false,
            'due_date'=> fake()->dateTimeBetween('now','+1 year'),
            'user_id'=> User::factory(),
        ];
    }
}
