<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->name(),
            'description' => $this->faker->text(50),
            'city' => $this->faker->city(),
            'country' => $this->faker->country(),
            'min_price' => $this->faker->numberBetween(500,1000),
            'max_price' => $this->faker->numberBetween(1001,2000),
            'user_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            
        ];
    }
}
