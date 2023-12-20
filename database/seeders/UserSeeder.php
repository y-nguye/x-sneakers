<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Nguyễn Hoài Ý',
                'email' => 'nguyenhoaiy7@gmail.com',
                'password' => Hash::make('123123'),
                'is_admin' => '1',
            ],
            [
                'name' => 'Nguyễn Thị Ngọc Lan',
                'email' => 'nguyenphandong1999@gmail.com',
                'password' => Hash::make('123123'),
            ]
        ];
        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
    }
}
