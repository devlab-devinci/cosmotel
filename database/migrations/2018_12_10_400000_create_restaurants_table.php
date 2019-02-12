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
            $table->integer('restaurateur_id')->unsigned();
            $table->string('name');
            $table->string('address');
            $table->text('description');
            $table->integer('service_interval')->nullable();
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->text('status');
            $table->timestamps();

            $table->foreign('restaurateur_id')->references('id')->on('restaurateurs')
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
        Schema::dropIfExists('restaurants');
    }
}
