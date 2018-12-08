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
            $table->string('picture')->nullable();
            $table->float('farina_amount')->nullable();
            $table->float('protein_amount')->nullable();
            $table->float('lipid_amount')->nullable();
            $table->float('calories_amount')->nullable();
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
