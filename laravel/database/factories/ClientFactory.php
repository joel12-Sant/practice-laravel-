<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class ClientFactory extends Factory
{
    protected $model = \App\Models\Client::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(), // o 1 si ya existe un usuario fijo
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'rfc' => 'XAXX010101000',
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
        ];
    }
}

