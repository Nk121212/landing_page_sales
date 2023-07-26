<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Ridwan',
            'email' => 'ridwan@gmail.com',
            'password' => bcrypt('admin123'),
            'status' => 1
        ]);
    }
}
