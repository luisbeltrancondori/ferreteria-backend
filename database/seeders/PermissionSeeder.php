<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name'=>'brand.index']);
        Permission::create(['name'=>'brand.store']);
        Permission::create(['name'=>'brand.show']);
        Permission::create(['name'=>'brand.update']);
        Permission::create(['name'=>'brand.destroy']);

        Permission::create(['name'=>'category.index']);
        Permission::create(['name'=>'category.store']);
        Permission::create(['name'=>'category.show']);
        Permission::create(['name'=>'category.update']);
        Permission::create(['name'=>'category.destroy']);

        Permission::create(['name'=>'unitmeasure.index']);
        Permission::create(['name'=>'unitmeasure.store']);
        Permission::create(['name'=>'unitmeasure.show']);
        Permission::create(['name'=>'unitmeasure.update']);
        Permission::create(['name'=>'unitmeasure.destroy']);

        Permission::create(['name'=>'product.index']);
        Permission::create(['name'=>'product.store']);
        Permission::create(['name'=>'product.show']);
        Permission::create(['name'=>'product.update']);
        Permission::create(['name'=>'product.destroy']);

        Permission::create(['name'=>'customer.index']);
        Permission::create(['name'=>'customer.store']);
        Permission::create(['name'=>'customer.show']);
        Permission::create(['name'=>'customer.update']);
        Permission::create(['name'=>'customer.destroy']);

        Permission::create(['name'=>'supplier.index']);
        Permission::create(['name'=>'supplier.store']);
        Permission::create(['name'=>'supplier.show']);
        Permission::create(['name'=>'supplier.update']);
        Permission::create(['name'=>'supplier.destroy']);

        Permission::create(['name'=>'office.index']);
        Permission::create(['name'=>'office.store']);
        Permission::create(['name'=>'office.show']);
        Permission::create(['name'=>'office.update']);
        Permission::create(['name'=>'office.destroy']);

        Role::create(['name'=>'administrador']);
        Role::create(['name'=>'gerente']);
        Role::create(['name'=>'vendedor']);
        Role::create(['name'=>'cliente']);

    }
}
