<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = [
            [
                "https://raw.githubusercontent.com/UBSI-Developers/sushiarigato-assets/main/products/11.jpg",
                "https://raw.githubusercontent.com/UBSI-Developers/sushiarigato-assets/main/products/12.jpg",
                "https://raw.githubusercontent.com/UBSI-Developers/sushiarigato-assets/main/products/13.jpg",
                "https://raw.githubusercontent.com/UBSI-Developers/sushiarigato-assets/main/products/14.jpg",
                "https://raw.githubusercontent.com/UBSI-Developers/sushiarigato-assets/main/products/15.jpg",
                "https://raw.githubusercontent.com/UBSI-Developers/sushiarigato-assets/main/products/16.jpg",
                "https://raw.githubusercontent.com/UBSI-Developers/sushiarigato-assets/main/products/17.jpg",
                "https://raw.githubusercontent.com/UBSI-Developers/sushiarigato-assets/main/products/18.jpg",
            ],
            [
                "https://raw.githubusercontent.com/UBSI-Developers/sushiarigato-assets/main/products/21.jpg",
                "https://raw.githubusercontent.com/UBSI-Developers/sushiarigato-assets/main/products/22.jpg",
                "https://raw.githubusercontent.com/UBSI-Developers/sushiarigato-assets/main/products/23.jpg",
                "https://raw.githubusercontent.com/UBSI-Developers/sushiarigato-assets/main/products/24.jpg",
                "https://raw.githubusercontent.com/UBSI-Developers/sushiarigato-assets/main/products/25.jpg",
            ],
            [
                "https://raw.githubusercontent.com/UBSI-Developers/sushiarigato-assets/main/products/31.jpg",
                "https://raw.githubusercontent.com/UBSI-Developers/sushiarigato-assets/main/products/32.jpg",
                "https://raw.githubusercontent.com/UBSI-Developers/sushiarigato-assets/main/products/33.jpg",
                "https://raw.githubusercontent.com/UBSI-Developers/sushiarigato-assets/main/products/34.jpg",
            ],
            [
                "https://raw.githubusercontent.com/UBSI-Developers/sushiarigato-assets/main/products/41.jpg",
                "https://raw.githubusercontent.com/UBSI-Developers/sushiarigato-assets/main/products/42.jpg",
                "https://raw.githubusercontent.com/UBSI-Developers/sushiarigato-assets/main/products/43.jpg",
                "https://raw.githubusercontent.com/UBSI-Developers/sushiarigato-assets/main/products/44.jpg",
                "https://raw.githubusercontent.com/UBSI-Developers/sushiarigato-assets/main/products/45.jpg",
            ],
            [
                "https://raw.githubusercontent.com/UBSI-Developers/sushiarigato-assets/main/products/51.jpg",
                "https://raw.githubusercontent.com/UBSI-Developers/sushiarigato-assets/main/products/52.jpg",
                "https://raw.githubusercontent.com/UBSI-Developers/sushiarigato-assets/main/products/53.jpg",
                "https://raw.githubusercontent.com/UBSI-Developers/sushiarigato-assets/main/products/54.jpg",
                "https://raw.githubusercontent.com/UBSI-Developers/sushiarigato-assets/main/products/55.jpg",
            ],
            [
                "https://raw.githubusercontent.com/UBSI-Developers/sushiarigato-assets/main/products/61.jpg",
                "https://raw.githubusercontent.com/UBSI-Developers/sushiarigato-assets/main/products/62.jpg",
                "https://raw.githubusercontent.com/UBSI-Developers/sushiarigato-assets/main/products/63.jpg",
            ],
        ];

        $names = [
            [
                "Takoyaki",
                "Tamagoyaki",
                "Tuna Skin",
                "Aburi",
                "Bakudan Sushi",
                "Fuzi Roll",
                "Salmon Kazan",
                "Abuti Kazan",
            ],
            [
                "Wagyu Abuti",
                "Wagyu Ichimiyaki",
                "Wagyu Kata Rohsu",
                "Wagyu Misoyaki",
                "Wagyu Salmon",
            ],
            [
                "Ebi Nigiri",
                "Salmon Nigiri",
                "Tako Nigiri",
                "Unagi Nigiri",
            ],
            [
                "Shimaaji Sashimi",
                "Toro Sashimi",
                "Uni Sashimi",
                "Prawn Sashimi",
                "Fresh Sashimi"
            ],
            [
                "Chef Salad",
                "Fresh Salad",
                "Green Salad",
                "Sashimi Salad",
                "Wakame Salad"
            ],
            [
                "Alvocado",
                "Orange",
                "Cocacola"
            ],
        ];

        foreach ($names as $i => $n) {

            foreach ($n as $j => $name) {
                DB::table('products')->insert([
                    'name' => $name,
                    'image' =>  $images[$i][$j],
                    'description' =>
                    "Makanan Jepang yang terdiri dari nasi yang dibentuk bersama lauk (neta) berupa makanan laut, daging, sayuran mentah atau sudah dimasak.
Nasi susyi mempunyai rasa masam yang lembut karena dibumbui campuran cuka beras, garam, dan gula.
Asal usul kata sushi adalah kata sifat untuk rasa masam yang ditulis dengan huruf kanji sushi (酸し).
Pada awalnya, sushi yang ditulis dengan huruf kanji 鮓 merupakan istilah untuk salah satu jenis pengawetan ikan disebut gyoshō (魚醤) yang membaluri ikan dengan garam dapur, bubuk ragi (麹 koji) atau ampas sake (糟 kasu). 
Penulisan sushi menggunakan huruf kanji 寿司 yang dimulai pada zaman Edo periode pertengahan merupakan cara penulisan ateji (menulis dengan huruf kanji lain yang berbunyi yang sama).",
                    'price' => rand(1, 9) * 10000,
                    'discount' => rand(0, 50),
                    'category_id' => ($i + 1),
                    'created_at' => date('Y-m-d H:i:s')
                ]);
            }
        }
    }
}
