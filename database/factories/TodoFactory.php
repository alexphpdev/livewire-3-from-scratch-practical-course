<?php

namespace Database\Factories;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Todo>
 */
class TodoFactory extends Factory
{
    protected $model = Todo::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'  => $this->faker->word,
            'body'   => $this->faker->text(rand(200, 2000)),
            'due_at' => $this->faker->dateTimeBetween(now()->addWeek(), now()->addYear()),
        ];
    }
}
