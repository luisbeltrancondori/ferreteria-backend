<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Unitmeasure;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UnitmeasureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $units = [
            ['name' => 'Kilogramo', 'abbreviation' => 'kg'],
            ['name' => 'Gramo', 'abbreviation' => 'g'],
            ['name' => 'Litro', 'abbreviation' => 'L'],
            ['name' => 'Mililitro', 'abbreviation' => 'mL'],
            ['name' => 'Metro', 'abbreviation' => 'm'],
            ['name' => 'Centímetro', 'abbreviation' => 'cm'],
            ['name' => 'Milímetro', 'abbreviation' => 'mm'],
            ['name' => 'Pulgada', 'abbreviation' => 'in'],
            ['name' => 'Pie', 'abbreviation' => 'ft'],
            ['name' => 'Yarda', 'abbreviation' => 'yd'],
        ];

        $unit = $this->faker->unique()->randomElement($units);

        return [
            'name' => $unit['name'],
            'abbreviation' => $unit['abbreviation']
        ];
    }
}

