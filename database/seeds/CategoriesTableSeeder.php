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
            [
                'name' => 'Chả chay',
                'slug' => 'cha-chay'
            ],[
                'name' => 'Nộm chay',
                'slug' => 'nom-chay'
            ],[
                'name' => 'Bún chay',
                'slug' => 'bun-chay'
            ],[
                'name' => 'Đậu phụ chay',
                'slug' => 'dau-phu-chay'
            ],[
                'slug' => 'bua-sang-chay',
                'name' => 'Bữa sáng chay'
            ],[
                'name' => 'Bữa trưa chay',
                'slug' => 'bua-trua-chay'
            ],[
                'name' => 'Bữa tối chay',
                'slug' => 'bua-toi-chay'
            ],[
                'name' => 'Canh chay',
                'slug' => 'canh-chay'
            ],[
                'name' => 'Kho chay',
                'slug' => 'kho-chay'
            ],[
                'name' => 'Rau củ chay',
                'slug' => 'rau-cu-chay'
            ],[
                'name' => 'Mì xào chay',
                'slug' => 'mi-xao-chay'
            ],[
                'name' => 'Bánh đa trộn chay',
                'slug' => 'banh-da-tron-chay'
            ],[
                'name' => 'Gà chay',
                'slug' => 'ga-chay'
            ],[
                'name' => 'Bò chay',
                'slug' => 'bo-chay'
            ],[
                'name' => 'Thịt lợn rán chay',
                'slug' => 'thit-lon-ran-chay'
            ],[
                'name' => 'Tết trung thu',
                'slug' => 'tet-trung-thu'
            ],[
                'name' => 'Tết nguyên đán',
                'slug' => 'tet-nguyen-dan'
            ],[
                'name' => 'Giáng sinh',
                'slug' => 'giang-sinh'
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
