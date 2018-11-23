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
        $categories = [
            ['name' => 'Chả chay'],
            ['name' => 'Nộm chay'],
            ['name' => 'Bún chay'],
            ['name' => 'Đậu phụ chay'],
            ['name' => 'Bữa sáng chay'],
            ['name' => 'Bữa trưa chay'],
            ['name' => 'Bữa tối chay'],
            ['name' => 'Canh chay'],
            ['name' => 'Kho chay'],
            ['name' => 'Rau củ chay'],
            ['name' => 'Mì xào chay'],
            ['name' => 'Bánh đa trộn chay'],
            ['name' => 'Gà chay'],
            ['name' => 'Bò chay'],
            ['name' => 'Thịt lợn rán chay'],
            ['name' => 'Tết trung thu'],
            ['name' => 'Tết nguyên đán'],
            ['name' => 'Giáng sinh'],
        ];

        DB::table('categories')->insert($categories);
    }
}
