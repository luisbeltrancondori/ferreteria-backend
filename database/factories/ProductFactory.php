<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Unitmeasure;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $products = [
            ['name' => 'Martillo', 'description' => 'Martillo de acero con mango de goma', 'price' => 12.99],
            ['name' => 'Destornillador', 'description' => 'Destornillador de estrella de 6 pulgadas', 'price' => 5.49],
            ['name' => 'Taladro Eléctrico', 'description' => 'Taladro inalámbrico de 18V con dos baterías', 'price' => 89.99],
            ['name' => 'Llave Inglesa', 'description' => 'Llave ajustable de 12 pulgadas', 'price' => 8.99],
            ['name' => 'Sierra Manual', 'description' => 'Sierra manual de 14 pulgadas para madera', 'price' => 7.99],
            ['name' => 'Cinta Métrica', 'description' => 'Cinta métrica de 5 metros', 'price' => 3.99],
            ['name' => 'Alicates', 'description' => 'Alicates de punta fina', 'price' => 4.99],
            ['name' => 'Nivel de Burbuja', 'description' => 'Nivel de burbuja de 24 pulgadas', 'price' => 9.99],
            ['name' => 'Caja de Herramientas', 'description' => 'Caja de herramientas de plástico con compartimentos', 'price' => 15.99],
            ['name' => 'Broca para Taladro', 'description' => 'Set de brocas para taladro, 10 piezas', 'price' => 10.99],
            // Puedes añadir más productos aquí
        ];

        $product = $this->faker->unique()->randomElement($products);

        return [
            'name' => $product['name'],
            'description' => $product['description'],
            'price' => $product['price'],
            'category_id'=>Category::all()->random()->id,
            'brand_id'=>Brand::all()->random()->id,
            'unitmeasurement_id'=>Unitmeasure::all()->random()->id,
        ];
    }
}
