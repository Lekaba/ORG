<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'usuario BanPro',
            'email' => 'usuario@gmail.com',
            'password' => Hash::make('password'),
        ]);
        DB::table('admins')->insert([
            'name' => 'Admin BanPro',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
        DB::table('sellers')->insert([
            'name' => 'Seller BanPro',
            'email' => 'seller@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
