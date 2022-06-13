<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            "Appetizer",
            "House Specialty",
            "Japanese Wagyu",
            "Juice",
            "Nigiri Sushi",
            "Salad",
            "Sashimi",
            "Tempura",
        ];
        foreach ($names as $i => $name) {
            DB::table('categories')->insert([
                'name' => $name,
                'image' => "images/categories/" . ($i + 1),
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
