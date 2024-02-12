<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $images_url = [
            "https://picsum.photos/560/360",
        ];
        return [
            'name' => fake()->colorName(),
            'estoque' => fake()->numberBetween(1, 100),
            'preco' => fake()->randomFloat(2, 1, 100),
            'imagem_url' => fake()->randomElement($images_url),
            'descricao' => fake()->text(100),
            'created_at' => fake()->dateTimeThisYear(),
            'updated_at' => fake()->dateTimeThisYear(),
        ];
    }
}
