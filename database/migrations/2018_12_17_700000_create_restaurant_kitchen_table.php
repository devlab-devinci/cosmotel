<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantKitchenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_kitchen', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('restaurant_id')->unsigned();
            $table->integer('kitchen_id')->unsigned();
            $table->timestamps();

            $table->foreign('restaurant_id')->references('id')->on('restaurants')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('kitchen_id')->references('id')->on('kitchens')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('restaurant_kitchen', function(Blueprint $table) {
            $table->dropForeign('restaurant_kitchen_restaurant_id_foreign');
            $table->dropForeign('restaurant_kitchen_kitchen_id_foreign');
        });

        Schema::dropIfExists('restaurant_kitchen');
    }
}
