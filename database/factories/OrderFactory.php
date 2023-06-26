<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'order_number' => $this->faker->unique()->randomNumber(8),
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'total_amount' => $this->faker->randomFloat(2, 0, 999999),
            'delivery_fee' => $this->faker->randomFloat(2, 0, 999999),
            'discount' => $this->faker->randomFloat(2, 0, 999999),
            'tax' => $this->faker->randomFloat(2, 0, 999999),
            'status' => $this->faker->randomElement(['pending', 'processing', 'completed', 'declined', 'cancelled', 'refunded', 'failed', 'on-hold']),
            'payment_method' => $this->faker->randomElement(['cod', 'paypal', 'stripe']),
            'delivery_address' => $this->faker->address,
            'delivery_time' => $this->faker->dateTimeBetween('now', '+1 year'),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
