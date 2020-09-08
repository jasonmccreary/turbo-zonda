<?php



namespace Database\Factories;

use App\Video;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Watch;

class WatchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Watch::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'user_id' => User::factory(),
        'video_id' => Video::factory(),
        'completed_at' => $this->faker->dateTime(),
    ];
    }
}
