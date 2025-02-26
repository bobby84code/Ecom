<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker\Factory::create();
        $images=[
            "https://ae-pic-a1.aliexpress-media.com/kf/A06233d3f7bd74572ada2a67849b41c0cf.jpg_220x220q75.jpg_.avif",
            "https://ae-pic-a1.aliexpress-media.com/kf/Sdf480f0073b64b64b4c6a41d61818e12s.jpg_220x220q75.jpg_.avif",
            "https://ae-pic-a1.aliexpress-media.com/kf/Sf8f564ba0d6d48fb945e91a1d1fe97a7h.jpeg_220x220q75.jpeg_.avif",
            "https://ae-pic-a1.aliexpress-media.com/kf/S2cc5f337876d40b0b4d05d958ccdae044.jpg_220x220q75.jpg_.avif",
            "https://ae-pic-a1.aliexpress-media.com/kf/S7b73cdab2c8a457dafbc12b54e635692Y.jpg_220x220q75.jpg_.avif",


        ];

        foreach (range(1, 100) as $key=>$value){
            $name=$faker->unique()->name;
            Product::create([
                'name'=>$name,
                'slug'=>Str::slug($name,'-'),
                'short_description'=>$faker->text(100),
                'long_description'=>$faker->text(300),
                'status'=>$faker->numberBetween(100, 500),
                'regular_price'=>$faker->numberBetween(100, 500),
                'sale_price'=>$faker->numberBetween(50, 300),
                'image'=>$images[rand(0,3)],
                'images'=>'1.png',
                'category_id'=>$faker->numberBetween(1, 10),
                'created_at'=>$faker->numberBetween(50, 300),
                'updated_at'=>$faker->numberBetween(50, 300),


            ]);
        }



    }
}
