<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(IngredientsTableSeeder::class);
        $this->call(DishesTableSeeder::class);
        $this->call(DishIngredientTableSeeder::class);
        $this->call(CookingStepsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);

    }
}
