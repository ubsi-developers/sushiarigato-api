<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Administrator",
            'email' => "admin@gmail.com",
            'password' => Hash::make('secret1234'),
            'address' =>  "Jl. Sepanjang Jalan Kenangan",
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
