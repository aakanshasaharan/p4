<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectMenusAndRecipes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('recipes', function (Blueprint $table) {
    # Add a new INT field called `menu_id` that has to be unsigned (i.e. positive)
          $table->integer('menu_id')->unsigned();
    # This field `menu_id` is a foreign key that connects to the `id` field in the `menus` table
          $table->foreign('menu_id')->references('id')->on('menus');
      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('recipes', function (Blueprint $table) {
          # ref: http://laravel.com/docs/5.1/migrations#dropping-indexes
          $table->dropForeign('recipes_menu_id_foreign');
          $table->dropColumn('menu_id');
      });
    }
}
