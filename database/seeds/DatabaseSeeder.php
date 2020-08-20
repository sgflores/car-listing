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
        $this->call(CarMakeSeeder::class);
        $this->call(CarModelSeeder::class);
        $this->call(CarsSeeder::class);
    }
}
