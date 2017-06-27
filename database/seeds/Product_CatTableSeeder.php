<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Product;

class Product_CatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 20;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('product_cat')->insert([ //,
                'product_id' => $faker->randomElement(Product::all()->pluck('id')->toArray()),
                'category_id' => $faker->randomElement(Category::all()->pluck('id')->toArray())
            ]);
        }
    }
}
