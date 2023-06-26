<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MenuItem>
 */
class MenuItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $menu_categories = \App\Models\MenuCategory::pluck('id')->toArray();

        return [
            'menu_category_id' => $this->faker->randomElement($menu_categories),
            'name' => $this->faker->word,
            'slug' => $this->faker->slug,
            'description' => $this->faker->sentence,
            'image' => null,
            'price' => $this->faker->randomFloat(2, 1, 100),
            'size' => $this->faker->randomElement(['small', 'medium', 'large', 'extra-large']),
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
