<?php

use Illuminate\Database\Seeder;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dishes = [
            [
                'name' => 'Khoai lang luộc',
                'farina_amount' => 28.5,
                'protein_amount' => 0.8,
                'lipid_amount' => 0.2,
                'calories_amount' => 119,
                'description' => 'Lorem',
                'picture' => 'khoailangluoc.jpg',
                'like_number' => 1,
            ],  [
                'name' => 'Đậu cô ve luộc',
                'farina_amount' => 54.9,
                'protein_amount' => 21.8,
                'lipid_amount' => 1.6,
                'calories_amount' => 321,
                'description' => 'Lorem',
                'picture' => 'daucoveluoc.jpg',
                'like_number' => 2,
            ], 
        ];
        
        DB::table('dishes')->insert($dishes);
    }
}
