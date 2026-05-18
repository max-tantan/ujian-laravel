<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Laptop',
            'price' => 15000000,
            'description' => 'Laptop gaming dengan spesifikasi tinggi',
        ]);

        Product::create([
            'name' => 'Smartphone',
            'price' => 5000000,
            'description' => 'Smartphone dengan kamera berkualitas tinggi',
        ]);

        Product::create([
            'name' => 'Headphones',
            'price' => 2000000,
            'description' => 'Headphones dengan suara jernih dan nyaman digunakan',
        ]);
    }
}
