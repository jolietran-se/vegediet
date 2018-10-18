<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name', 191);
            $table->text('description');
            $table->string('picture');
            $table->float('farina_amount');
            $table->float('protein_amount');
            $table->float('lipid_amount');
            $table->float('calories_amount');
            $table->integer('like_number');
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
        Schema::dropIfExists('dishes');
    }
}
