<?php



namespace Database\Factories\User;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\User;

class ModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'last_name' => \Str::after('McCreary, Jason', ', '),
            'created_at' => now(),
        ];
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'created_at' => now(),
        ];
    }
}