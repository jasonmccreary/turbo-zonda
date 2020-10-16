<?php

namespace Database\Factories\Nested;

use App\Nested\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\User::factory(),
            'content' => $this->faker->paragraphs(3, true),
            'approved' => $this->faker->boolean,
        ];
    }
}
