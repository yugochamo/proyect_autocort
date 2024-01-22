<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Car;
use Illuminate\Database\Seeder;

class CarsSeeder extends Seeder{

    public function run():void 
    {
        $cars = Car::factory(5)->create();
    }
}
