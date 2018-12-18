<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('address');
            $table->text('description');
            $table->decimal('lat', 10, 8);
            $table->decimal('long', 11, 8);
            $table->integer('restaurateur_id')->unsigned();
            $table->foreign('restaurateur_id')->references('id')->on('restaurateurs')
                ->onDelete('restrict')
                ->onUpdate('restrict');
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
        Schema::table('restaurants', function(Blueprint $table) {
            $table->dropForeign('restaurants_restaurateur_id_foreign');
        });

        Schema::dropIfExists('restaurants');
    }
}
