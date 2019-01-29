<?php

use Illuminate\Database\Seeder;
use App\Opening;

class OpeningsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Opening::class, 49)->create();
    }
}
