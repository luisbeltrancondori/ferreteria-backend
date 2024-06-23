<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'last_name'=>$this->faker->lastName(),
            'mother_last_name'=>$this->faker->lastName(),
            'cell_phone'=>$this->faker->phoneNumber(),
            'email'=>$this->faker->email()
        ];
    }
}
