<?php
namespace App\Services\UserServices;

use App\Car;
use App\Repository;
use Illuminate\Http\Request;
use App\Services\BaseService;
use App\Traits\Imageuploader;
use App\Services\CarInterface;
use App\Traits\EloquentHelpers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class CarService extends BaseService implements CarInterface {

    use EloquentHelpers, Imageuploader;

    public $model;

    public function __construct()
    {
        parent::__construct(new Car);
    }

    // override parent method
    public function store(Request $request)
    {

        return DB::transaction(function($query) use ($request) {
            
            $carMake = $this->firstOrCreate(new Repository, 
                ['type' => 'make', 'name' => $request->make_id]
            );

            $carModel = $this->firstOrCreate(new Repository, 
                ['type' => 'model', 'name' => $request->model_id]
            );

            $request['photo'] = $this->processFileUpload($request->photo, Config::get('constants.uploads_location'));

            $request['make_id'] = $carMake->id;
            $request['model_id'] = $carModel->id;

            return parent::store($request);

        });
    }
    
}