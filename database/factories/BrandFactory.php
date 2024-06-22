<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $marcas = ['Toyota','Honda','Susuki','Valtra','Tramotina','Bosch','Kindler','Loctite','Dolmar','Telwin','Leica'];

        return [
            'name' => $this->faker->unique()->randomElement($marcas),
            'description' => $this->faker->sentence,
        ];
    }
}
