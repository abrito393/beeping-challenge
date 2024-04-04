<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Product; 

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model for the factory.
     *
     * @return string
     */
    public function model()
    {
        return Product::class;
    }
    
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'cost' => fake()->randomFloat(2, 0, 1000), // Generate random cost between 0 and 1000.00 with 2 decimals
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
