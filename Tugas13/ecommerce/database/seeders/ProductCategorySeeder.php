<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_categories')->insert([
            ['name' => 'Food'],
            ['name' => 'Electronics'],
            ['name' => 'Fashion'],
            ['name' => 'Furniture'],
            ['name' => 'Books'],
        ]);
    }
}
