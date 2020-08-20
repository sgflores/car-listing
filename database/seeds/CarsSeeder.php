<?php

use App\Car;
use Illuminate\Database\Seeder;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Car::find(1)) {
            Car::create([
                'id' => 1,
                'model_id' => '6',
                'make_id' => '1',
                'year' => '2000',
                'price' => '1000',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Aliquam sem et tortor consequat id porta nibh venenatis cras. Pellentesque habitant morbi tristique senectus et. Nec feugiat in fermentum posuere urna nec tincidunt. ',
                'photo' => 'sedan.jpg',
            ]);
        }

        if (!Car::find(2)) {
            Car::create([
                'id' => 2,
                'model_id' => '7',
                'make_id' => '2',
                'year' => '2000',
                'price' => '1000',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Aliquam sem et tortor consequat id porta nibh venenatis cras. Pellentesque habitant morbi tristique senectus et. Nec feugiat in fermentum posuere urna nec tincidunt. ',
                'photo' => 'bmw.jpg',
            ]);
        }

        if (!Car::find(3)) {
            Car::create([
                'id' => 3,
                'model_id' => '8',
                'make_id' => '3',
                'year' => '2000',
                'price' => '1000',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Aliquam sem et tortor consequat id porta nibh venenatis cras. Pellentesque habitant morbi tristique senectus et. Nec feugiat in fermentum posuere urna nec tincidunt. ',
                'photo' => 'ford.jpg',
            ]);
        }

        if (!Car::find(4)) {
            Car::create([
                'id' => 4,
                'model_id' => '9',
                'make_id' => '4',
                'year' => '2000',
                'price' => '1000',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Aliquam sem et tortor consequat id porta nibh venenatis cras. Pellentesque habitant morbi tristique senectus et. Nec feugiat in fermentum posuere urna nec tincidunt. ',
                'photo' => 'honda.png',
            ]);
        }

        if (!Car::find(5)) {
            Car::create([
                'id' => 5,
                'model_id' => '10',
                'make_id' => '5',
                'year' => '2000',
                'price' => '1000',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Aliquam sem et tortor consequat id porta nibh venenatis cras. Pellentesque habitant morbi tristique senectus et. Nec feugiat in fermentum posuere urna nec tincidunt. ',
                'photo' => 'lexus.jpg',
            ]);
        }

    }
}
