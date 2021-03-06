<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('en_US');

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('categories')->insert([ //,
                'name' => $faker->name,
                'description' => $faker->text
            ]);
        }
    }
    
}
