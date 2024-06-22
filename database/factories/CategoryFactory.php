<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $categories = [
            'Herramientas Manuales',
            'Herramientas Eléctricas',
            'Pinturas y Accesorios',
            'Fontanería',
            'Jardinería',
            'Ferretería General',
            'Seguridad y Protección',
            'Material de Construcción',
            'Iluminación',
            'Accesorios de Baño',
            'Productos de Limpieza',
            'Cerraduras y Candados',
            'Tornillos',
        ];

        return [
            'name'=>$this->faker->unique()->randomElement($categories),
            'description'=>$this->faker->sentence(),
        ];
    }
}
