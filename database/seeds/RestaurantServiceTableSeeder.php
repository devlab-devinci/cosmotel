<?php

use Illuminate\Database\Seeder;

class RestaurantServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\RestaurantService::class, 10)->create();
    }
}
