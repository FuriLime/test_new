<?php

use Illuminate\Database\Seeder;

use App\Product;

class AmountProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 40;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('amount_products')->insert([ //,
                'amount' => $faker->randomDigit,
                'product_id' => $faker->randomElement(Product::all()->pluck('id')->toArray())
            ]);
        }
    }
}
