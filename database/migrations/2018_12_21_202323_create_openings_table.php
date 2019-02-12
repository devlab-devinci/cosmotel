<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpeningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opening', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('restaurant_id')->unsigned();
            $table->foreign('restaurant_id')->references('id')->on('restaurants')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->integer('day');
            $table->boolean('open_morning');
            $table->time('open_time_morning')->nullable();
            $table->time('close_time_morning')->nullable();
            $table->boolean('open_lunch');
            $table->time('open_time_lunch')->nullable();
            $table->time('close_time_lunch')->nullable();
            $table->boolean('open_dinner');
            $table->time('open_time_dinner')->nullable();
            $table->time('close_time_dinner')->nullable();
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
        Schema::dropIfExists('opening');
    }
}
