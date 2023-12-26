<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'type' => 'Men',
            ],
            [
                'type' => 'Women',
            ],
            [
                'type' => 'Kids',
            ],
        ];
        foreach ($types as $type) {
            DB::table('types')->insert($type);
        }
    }
}
