<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Product;

class ProductsTableSeeder extends Seeder
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
            DB::table('products')->insert([ //,
                'product_name' => $faker->name,
                'description' => $faker->text,
                'category_id' => $faker->randomElement(Category::all()->pluck('id')->toArray())
            ]);
        }
    }
}
