<?php

use Illuminate\Database\Seeder;

class Dish_CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dish_cate = [
            [
                'dish_id' => 1,
                'category_id' => 1,
            ], [
                'dish_id' => 1,
                'category_id' => 2,
            ], [
                'dish_id' => 1,
                'category_id' => 3,
            ], [
                'dish_id' => 1,
                'category_id' => 4,
            ], [
                'dish_id' => 2,
                'category_id' => 5,
            ], [
                'dish_id' => 2,
                'category_id' => 4,
            ], [
                'dish_id' => 2,
                'category_id' => 7,
            ], [
                'dish_id' => 2,
                'category_id' => 8,
            ], [
                'dish_id' => 3,
                'category_id' => 3,
            ], [
                'dish_id' => 3,
                'category_id' => 4,
            ], [
                'dish_id' => 3,
                'category_id' => 5,
            ], [
                'dish_id' => 4,
                'category_id' => 4,
            ], [
                'dish_id' => 4,
                'category_id' => 8,
            ], [
                'dish_id' => 4,
                'category_id' => 9,
            ], [
                'dish_id' => 5,
                'category_id' => 5,
            ], [
                'dish_id' => 6,
                'category_id' => 6,
            ], [
                'dish_id' => 7,
                'category_id' => 7,
            ], [
                'dish_id' => 8,
                'category_id' => 8,
            ], [
                'dish_id' => 9,
                'category_id' => 9,
            ], [
                'dish_id' => 10,
                'category_id' => 10,
            ], 
        ];

        DB::table('dish_category')->insert($dish_cate);
    }
}
