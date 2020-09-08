<?php

namespace Database\Factories;

use App\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
    // password
    'remember_token' => Str::random(10),
    'verified' => 1,
    'company_id' => function () {
        return Company::factory()->create()->id;
    },
];
    }

    public function unverified()
    {
        return $this->state(function () {
            return ['verified' => 0];
        });
    }
}
