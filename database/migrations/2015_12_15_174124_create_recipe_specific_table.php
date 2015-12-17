<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipeSpecificTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('recipe_specific', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();

          $table->integer('recipe_id')->unsigned();
          $table->integer('specific_id')->unsigned();

          $table->foreign('recipe_id')->references('id')->on('recipes');
          $table->foreign('specific_id')->references('id')->on('specifics');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('recipe_specific');
    }
}
