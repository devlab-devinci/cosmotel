<?php

use Illuminate\Database\Seeder;

class RestaurantKitchenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\RestaurantKitchen::class, 10)->create();
    }
}
