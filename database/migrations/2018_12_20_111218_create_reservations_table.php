<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('restaurant_id')->unsigned();
            $table->foreign('restaurant_id')->references('id')->on('restaurants')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->integer('influencer_id')->unsigned();
            $table->foreign('influencer_id')->references('id')->on('influencers')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->string('status');
            $table->string('discount')->comment = "Percentage";
            $table->string('stories')->nullable();
            $table->string('posts')->nullable();
            $table->timestamp('dateTime');
            $table->integer('client_count');
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
        Schema::dropIfExists('reservations');
    }
}
