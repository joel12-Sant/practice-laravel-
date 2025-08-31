<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();

        Client::factory()->create([
            'user_id' => $user->id,
            'name' => 'Cliente Uno',
            'email' => 'cliente1@example.com',
            'rfc' => 'XAXX010101000',
            'phone' => '5551234567',
            'address' => 'Calle Falsa 123',
        ]);

        Client::factory()->create([
            'user_id' => $user->id,
            'name' => 'Cliente Dos',
            'email' => 'cliente2@example.com',
            'rfc' => 'XEXX010101000',
            'phone' => '5559876543',
            'address' => 'Avenida Siempre Viva 742',
        ]);
    }
}
