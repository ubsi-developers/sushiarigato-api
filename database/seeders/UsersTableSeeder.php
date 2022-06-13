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
        for ($i = 0; $i < 20; $i++) {
            DB::table('users')->insert([
                'name' => "users" . ($i + 1),
                'email' => "users" . ($i + 1) . '@gmail.com',
                'password' => Hash::make('secret'),
                'address' =>  Str::random(5) . " " . Str::random(4) . " " . Str::random(5),
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
