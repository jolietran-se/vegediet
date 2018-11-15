<?php

use Illuminate\Database\Seeder;

class CookingStepsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $steps = [
            [
                'dish_id' => 1,
                'step' => 'Rửa khoai lang',
            ], [
                'dish_id' => 1,
                'step' => 'Luộc khoai lang',
            ], [
                'dish_id' => 2,
                'step' => 'Nhặt đậu cô ve',
            ], [
                'dish_id' => 2,
                'step' => 'Rửa đậu cô ve',
            ], [
                'dish_id' => 2,
                'step' => 'Luộc đậu cô ve',
            ],
        ];

        DB::table('cooking_steps')->insert($steps);
    }
}
