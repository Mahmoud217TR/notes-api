<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'description' => fake()->text(400),
            'user_id' => optional(User::inRandomOrder()->first())->id??User::class,
        ];
    }

    public function forUser(User|int $user): static
    {
        return $this->state(fn (array $attributes) => [
            'user_id' => modelId($user),
        ]);
    }

    public function forNewUser(): static
    {
        return $this->state(fn (array $attributes) => [
            'user_id' => User::class,
        ]);
    }
}
