<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();

        Product::factory()->create([
            'user_id' => $user->id,
            'name' => 'Producto A',
            'description' => 'Descripción del Producto A',
            'price' => 100,
            'tax' => 16,
        ]);

        Product::factory()->create([
            'user_id' => $user->id,
            'name' => 'Producto B',
            'description' => 'Descripción del Producto B',
            'price' => 200,
            'tax' => 16,
        ]);
    }
}
