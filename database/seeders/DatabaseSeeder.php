<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Brand;
use App\Models\Unitmeasure;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(10)->create();
        Brand::factory(10)->create();
        Unitmeasure::factory(8)->create();
        Product::factory(10)->create();

        // $this->call(CategorySeeder::class);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
