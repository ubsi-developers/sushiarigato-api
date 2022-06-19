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
            "Japanese Wagyu",
            "House Specialty",
            "Sashimi",
            "Salad",
            "Juice",
        ];
        foreach ($names as $i => $name) {
            DB::table('categories')->insert([
                'name' => $name,
                'image' => "https://raw.githubusercontent.com/UBSI-Developers/sushiarigato-assets/main/categories/" . ($i + 1) . ".jpg",
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
