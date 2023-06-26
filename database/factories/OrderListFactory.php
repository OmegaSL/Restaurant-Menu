<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderList>
 */
class OrderListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $orders = \App\Models\Order::pluck('id')->toArray();
        $menu_items = \App\Models\MenuItem::pluck('id')->toArray();

        return [
            'order_id' => $this->faker->randomElement($orders),
            'menu_item_id' => $this->faker->randomElement($menu_items),
            'quantity' => $this->faker->randomNumber(2),
            'unit_price' => $this->faker->randomFloat(2, 0, 999999),
            'total_amount' => $this->faker->randomFloat(2, 0, 999999),
        ];
    }
}
