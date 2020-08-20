<?php

use App\Repository;
use Illuminate\Database\Seeder;

class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Repository::find(6)) {
            Repository::create([
                'id' => 6,
                'type' => 'model',
                'name' => '2020 A3 Sedan'
            ]);
        }

        if (!Repository::find(7)) {
            Repository::create([
                'id' => 7,
                'type' => 'model',
                'name' => 'BMW Wagon'
            ]);
        }

        if (!Repository::find(8)) {
            Repository::create([
                'id' => 8,
                'type' => 'model',
                'name' => 'Ford EcoSport'
            ]);
        }

        if (!Repository::find(9)) {
            Repository::create([
                'id' => 9,
                'type' => 'model',
                'name' => 'Honda Amaze'
            ]);
        }

        if (!Repository::find(10)) {
            Repository::create([
                'id' => 10,
                'type' => 'model',
                'name' => 'NX 300 F SPORT'
            ]);
        }
    }
}
