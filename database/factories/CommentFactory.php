<?php

namespace Database\Factories;

use App\Comment;
use App\User;
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
        return ['user_id' => User::factory(), 'content' => $this->faker->paragraphs(3, true), 'approved' => $this->faker->boolean];
    }
}
