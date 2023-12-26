<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Nike Jordan',
                'describe' => 'Giày thể thao',
                'quantity' => 4,
                'type_id' => 1,
            ],
            [
                'name' => 'Nike Air Max 207',
                'describe' => 'Big Kids Shoes',
                'quantity' => 14,
                'type_id' => 2,
            ],
            [
                'name' => 'Nike Dunk Low',
                'describe' => 'Big Kids Shoes',
                'quantity' => 5,
                'type_id' => 3,
            ],
        ];
        foreach ($products as $product) {
            $product['slug'] = Str::slug($product['name']);
            DB::table('products')->insert($product);
        }
    }
}
