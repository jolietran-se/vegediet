<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateIngredientIdToDishIngredientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dish_ingredient', function (Blueprint $table) {
            $table->renameColumn('ingrdient_id', 'ingredient_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dish_ingredient', function (Blueprint $table) {
            $table->renameColumn('ingredient_id', 'ingrdient_id');
        });
    }
}
