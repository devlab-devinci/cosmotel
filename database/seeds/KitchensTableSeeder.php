<?php

use Illuminate\Database\Seeder;

class KitchensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Kitchen::class, 10)->create();
    }
}
