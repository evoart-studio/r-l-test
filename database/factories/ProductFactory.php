<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'content' => $this->faker->realText(),
            'stock' => rand(0, 20),
            'price' => rand(1000, 2000),
        ];
    }
}
