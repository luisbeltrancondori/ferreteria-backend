<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = new Category();
        $category->name = 'Tornillos';
        $category->description = 'Tornillos de diferentes tamaños y materiales';
        $category->save();

        $category1 = new Category();
        $category1->name = 'Taladros';
        $category1->description = 'Taladros de diferentes tamaños y materiales';
        $category1->save();
    }
}
