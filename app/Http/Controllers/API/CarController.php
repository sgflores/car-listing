<?php

namespace App\Http\Controllers\API;

use App\Car;
use App\Http\Requests\CarRequest;
use App\Services\UserServices\CarService;
use App\Http\Controllers\API\APIBaseController;

class CarController extends APIBaseController
{
    public $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
        parent::__construct($carService, new CarRequest, new Car);
    }

}
