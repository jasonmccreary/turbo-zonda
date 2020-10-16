<?php

namespace Database\Factories;

use App\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Video::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(4),
            'synopsis' => $this->faker->text,
            'duration' => $this->faker->randomFloat(2, 0, 999999.99),
        ];
    }
}
