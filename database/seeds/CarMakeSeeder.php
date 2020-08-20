<?php

use App\Repository;
use Illuminate\Database\Seeder;

class CarMakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Repository::find(1)) {
            Repository::create([
                'id' => 1,
                'type' => 'make',
                'name' => 'AUDI'
            ]);
        }

        if (!Repository::find(2)) {
            Repository::create([
                'id' => 2,
                'type' => 'make',
                'name' => 'BMW'
            ]);
        }

        if (!Repository::find(3)) {
            Repository::create([
                'id' => 3,
                'type' => 'make',
                'name' => 'FORD'
            ]);
        }

        if (!Repository::find(4)) {
            Repository::create([
                'id' => 4,
                'type' => 'make',
                'name' => 'HONDA'
            ]);
        }

        if (!Repository::find(5)) {
            Repository::create([
                'id' => 5,
                'type' => 'make',
                'name' => 'LEXUS'
            ]);
        }
    }
}
