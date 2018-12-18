<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(InfluencersTableSeeder::class);
        $this->call(RestaurateursTableSeeder::class);
        $this->call(RestaurantsTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(KitchensTableSeeder::class);
        $this->call(RestaurantServiceTableSeeder::class);
        $this->call(RestaurantKitchenTableSeeder::class);
    }
}
