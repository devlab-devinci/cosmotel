<?php

use Illuminate\Database\Seeder;

class RestaurateursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Restaurateur::class, 5)->create();
    }
}
