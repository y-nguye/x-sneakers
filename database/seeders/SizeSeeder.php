<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizes = [
            [
                'size' => 'S',
            ],
            [
                'size' => 'M',
            ],
            [
                'size' => 'L',
            ],
            [
                'size' => 'XL',
            ],
            [
                'size' => 'XXL',
            ],
        ];
        foreach ($sizes as $size) {
            DB::table('sizes')->insert($size);
        }
    }
}
