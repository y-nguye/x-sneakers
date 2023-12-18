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
        $products = [
            [
                'name' => 'Nike Jordan',
                'describe' => 'Giày thể thao',
                'quantity' => '4',
            ],
            [
                'name' => 'Nike Air Max 207',
                'describe' => 'Big Kids Shoes',
                'quantity' => '14',
            ],
            [
                'name' => 'Nike Dunk Low',
                'describe' => 'Big Kids Shoes',
                'quantity' => '5',
            ],
        ];
        foreach ($products as $product) {
            DB::table('products')->insert($product);
        }
    }
}
