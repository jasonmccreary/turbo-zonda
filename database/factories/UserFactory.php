<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

$factory->afterCreatingState(App\User::class, 'unverified', function ($faker) {
    return [
        'verified' => 0,
    ];
});

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $email = $this->faker->safeEmail;

        return [
            'username' => $this->faker->unique()->username,
            'email' => $email,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'verified' => 1,
            'company_id' => function () {
                return \App\Company::factory()->create()->id;
            },
        ];
    }

    public function unverified()
    {
        return $this->state(function () {
            return [
                'verified' => 0,
            ];
        });
    }
}
