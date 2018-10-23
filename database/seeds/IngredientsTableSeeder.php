<?php

use Illuminate\Database\Seeder;

class IngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingredients = [
            [
                'name' => 'Gạo nếp',
                'farina' => 0.749,
                'protein' => 0.084,
                'lipid' => 0.016,
                'calories' => 3.46,
            ], [
                'name' => 'Gạo tẻ',
                'farina' => 0.75,
                'protein' => 0.081,
                'lipid' => 0.013,
                'calories' => 3.44,
            ], [
                'name' => 'Gạo lứt',
                'farina' => 0.728,
                'protein' => 0.075,
                'lipid' => 0.027,
                'calories' => 3.45,
            ], [
                'name' => 'Kê',
                'farina' => 0.69,
                'protein' => 0.07,
                'lipid' => 0.03,
                'calories' => 3.31,
            ], [
                'name' => 'Sắn',
                'farina' => 0.364,
                'protein' => 0.011,
                'lipid' => 0.002,
                'calories' => 1.52,
            ], [
                'name' => 'Sắn dây',
                'farina' => 0.28,
                'protein' => 0.016,
                'lipid' => 0.001,
                'calories' => 1.19,
            ], [
                'name' => 'Khoai lang',
                'farina' => 0.285,
                'protein' => 0.008,
                'lipid' => 0.002,
                'calories' => 1.19,
            ], [
                'name' => 'Đậu cô ve',
                'farina' => 0.549,
                'protein' => 0.218,
                'lipid' => 0.016,
                'calories' => 3.21,
            ],
        ];

        DB::table('ingredients')->insert($ingredients);
    }
}
