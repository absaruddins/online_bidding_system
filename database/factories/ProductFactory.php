<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->numberBetween(100, 5000), // price is string column but number ok
            'image' => 'test.jpg', // dummy image name
        ];
    }
}
