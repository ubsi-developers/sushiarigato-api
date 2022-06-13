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
                "takoyaki.jpg",
                "tamagoyaki.jpg",
                "tuna_skin.jpg"
            ],
            [
                "aburi.jfif",
                "bakudan_sushi.jpg",
                "fuzi_roll.jpg",
                "fuzi_rolls.jpeg",
                "salmon_kazan.jfif",
                "salmon_wafu.jpg"
            ],
            [
                "wagyu_abuti.jpg",
                "wagyu_ichimiyaki.jpg",
                "wagyu_kata_rohsu.jpg",
                "wagyu_misoyaki.jfif"
            ],
            [
                "alvocado.jpg",
                "orange.png",
                "strawberry.jpg"
            ],
            [
                "ebi.jpg",
                "jo unagi.jpg",
                "salmon_nigiri.jpg",
                "tako.jpg",
                "tamago.jpg"
            ],
            [
                "chef_salad.jpg",
                "fresh_salad.webp",
                "green_salad.jpg",
                "sashimi_salad.jpg",
                "sashimi_salad.webp",
                "wakame_salad.jpg"
            ],
            [
                "hamachi.jpg",
                "maguro.jpeg",
                "namahotate.jpg",
                "salmond.jpeg",
                "shimaaji.jpg",
                "shimaaji.webp",
                "toro.jpg",
                "uni.jpg"
            ],
            [
                "prawn_tempura.jpg",
                "shrimp.webp"
            ]
        ];

        $names = [
            [
                "Takoyaki",
                "Tamagoyaki",
                "Tuna Skin"
            ],
            [
                "Aburi",
                "Bakudan Sushi",
                "Fuzi Roll",
                "Fuzi Rolls",
                "Salmon Kazan",
                "Salmon Wafu"
            ],
            [
                "Wagyu Abuti",
                "Wagyu Ichimiyaki",
                "Wagyu Kata Rohsu",
                "Wagyu Misoyaki"
            ],
            [
                "Alvocado",
                "Orange",
                "Strawberry"
            ],
            [
                "Ebi",
                "Jo Unagi",
                "Salmon Nigiri",
                "Tako",
                "Tamago"
            ],
            [
                "Chef Salad",
                "Fresh Salad",
                "Green Salad",
                "Sashimi Salad",
                "Sashimi Salad",
                "Wakame Salad"
            ],
            [
                "Hamachi",
                "Maguro",
                "Namahotate",
                "Salmond",
                "Shimaaji",
                "Shimaaji",
                "Toro",
                "Uni"
            ],
            [
                "Prawn Tempura Rolls",
                "Shrimp"
            ]
        ];

        foreach ($names as $i => $n) {

            foreach ($n as $j => $name) {
                DB::table('products')->insert([
                    'name' => $name,
                    'image' => "images/products/" . $images[$i][$j],
                    'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                    'price' => rand(1, 9) * 10000,
                    'discount' => rand(0, 50),
                    'category_id' => ($i + 1),
                    'created_at' => date('Y-m-d H:i:s')
                ]);
            }
        }
    }
}
