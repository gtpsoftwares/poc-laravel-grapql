<?php

use Illuminate\Database\Seeder;
use App\Product;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'product_name' => 'Iphone 10',
            'product_image' => 'A Iphone 10 medium-bodied mobile characterized by a marvelous freshness with a lingering, fruity finish',
            'quantity' => rand(5,50),
            'sku' => Str::random(10),
            'category' => 'Electronic',
            'sub_category' => 'Mobile',
        ]);

        Product::create([
            'product_name' => 'Basmati Rice',
            'product_image' => 'A Best Quality Basmati ever launched',
            'quantity' => rand(5,50),
            'sku' => Str::random(10),
            'category' => 'Grocery',
            'sub_category' => 'Rice',
        ]);

        Product::create([
            'product_name' => 'Micromax Bharat 2 Plus',
            'product_image' => 'A medium-bodied wine characterized by a marvelous freshness with a lingering, fruity finish',
            'quantity' => rand(5,50),
            'sku' => Str::random(10),
            'category' => 'Electronic',
            'sub_category' => 'Mobile',
        ]);

        Product::create([
            'product_name' => 'Lava X',
            'product_image' => 'The Best Mobile From Lava',
            'quantity' => rand(5,50),
            'sku' => Str::random(10),
            'category' => 'Electronic',
            'sub_category' => 'Mobile',
        ]);

        Product::create([
            'product_name' => 'Classic Chianti',
            'product_image' => 'A medium-bodied wine characterized by a marvelous freshness with a lingering, fruity finish',
            'quantity' => rand(5,50),
            'sku' => Str::random(10),
            'category' => 'Store',
            'sub_category' => 'Other',
        ]);

        Product::create([
            'product_name' => 'T Shirts',
            'product_image' => 'A medium-bodied wine characterized by a marvelous freshness with a lingering, fruity finish',
            'quantity' => rand(5,50),
            'sku' => Str::random(10),
            'category' => 'Garments',
            'sub_category' => 'Fashion',
        ]);

        Product::create([
            'product_name' => 'Johns Shirts',
            'product_image' => 'A medium-bodied wine characterized by a marvelous freshness with a lingering, fruity finish',
            'quantity' => rand(5,50),
            'sku' => Str::random(10),
            'category' => 'Garments',
            'sub_category' => 'Fashion',
        ]);

        Product::create([
            'product_name' => 'Olive Oil',
            'product_image' => 'A medium-bodied wine characterized by a marvelous freshness with a lingering, fruity finish',
            'quantity' => rand(5,50),
            'sku' => Str::random(10),
            'category' => 'Grocery',
            'sub_category' => 'oil',
        ]);

        Product::create([
            'product_name' => 'Demo Product',
            'product_image' => 'A medium-bodied wine characterized by a marvelous freshness with a lingering, fruity finish',
            'quantity' => rand(5,50),
            'sku' => Str::random(10),
            'category' => 'demo',
            'sub_category' => 'sub demo',
        ]);

        Product::create([
            'product_name' => 'Test Product',
            'product_image' => 'A medium-bodied wine characterized by a marvelous freshness with a lingering, fruity finish',
            'quantity' => rand(5,50),
            'sku' => Str::random(10),
            'category' => 'Test',
            'sub_category' => 'sub test',
        ]);
    }
}
