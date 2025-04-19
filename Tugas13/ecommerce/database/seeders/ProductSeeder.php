<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'iPhone 11 iBox 128Gb',
                'description' => 'Phone 11 iBox 128Gb Second, Kondisi Barang : 95%',
                'image' => 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcRQCBFBcPLodSMmae7GpfhvmirulcNFluP2JKfBfWvNp2HXin_1gj94SzpPmIlG-Z4GgDeT1H58qRlev-gJVs3eJCzhECFAfjeBh7w0euYa45yRZXmB4s2JZQ',
                'price' => 3700000,
                'stock' => 10,
                'product_category_id' => 2,
            ],[
                'name' => 'Sherlock Holmes',
                'description' => 'Buku Sherlock Holmes Koleksi Kasus 1 2 Sir Arthur Conan Doyle',
                'image' => 'https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcQkmC-0neAN-f0PIYM9IsggrwiiG7rlfx3miPg8VrIsAclk_qZvoKpJJM3HerkhTVdYpVIQtPoSHqgnSTAYveix0-P38WyBQbwRwaUcTFilscg5neTWQ_pidkM',
                'price' => 169000,
                'stock' => 40,
                'product_category_id' => 5,
            ],[
                'name' => 'Lotte Choco Pie',
                'description' => 'Biscuit Lotte Choco Pie 6 Pack',
                'image' => 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcSlaSoVl5_JoBjAk0nR9ghZ6HhCCZKG_WhVE5NauIsBBefY-GjtFqofxZaSpewaq7tOa2TNz9f4Ow28g-crZSjRC6rK59ZP5iPRG9HPa4yGsQcmztywwnzPtQA',
                'price' => 24200,
                'stock' => 120,
                'product_category_id' => 1,
            ]
        ]);
    }
}
