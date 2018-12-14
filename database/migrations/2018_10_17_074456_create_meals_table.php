<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('dish_id')->unsigned();
            $table->string('name');
            $table->float('meal_farina')->nullable();
            $table->float('meal_protein')->nullable();
            $table->float('meal_lipid')->nullable();
            $table->float('meal_calories')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meals');
    }
}
