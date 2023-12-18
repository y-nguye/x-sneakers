<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            [
                'color' => 'Black',
            ],
            [
                'color' => 'Red',
            ],
            [
                'color' => 'Yellow',
            ],
        ];
        foreach ($colors as $color) {
            DB::table('colors')->insert($color);
        }
    }
}
