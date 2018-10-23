<?php

use Illuminate\Database\Seeder;

class DishIngredientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amount = [
            [
                'ingredient_id' => 7,
                'dish_id' => 1,
                'weight' => 100,
            ], [
                'ingredient_id' => 8,
                'dish_id' => 2,
                'weight' => 100,
            ],
        ];

        DB::table('dish_ingredient')->insert($amount);
    }
}
