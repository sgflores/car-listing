<?php
namespace App\Services;

use Illuminate\Http\Request;
use App\Services\BaseInterface;
use App\Traits\EloquentHelpers;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;


class BaseService implements BaseInterface
{
    use EloquentHelpers;

    public $urlParams = [];

    public $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->parseUrlParams();
    }

    /**
     * 
     */
    public function index(Request $request)
    {
        $validFilters = $this->model->_queryFilters ?? [];

        $eagerLoaded = $this->model->_eagerLoaded ?? [];

        $urlParams = $this->urlParams;
        
        // laravel logger
        Log::info($urlParams);

        // returns eloquent query builder
        $query = $this->model->query();

        // specific search
        $validatedFilters = array_intersect(array_keys($urlParams), $validFilters);

        $query = $this->filterQuery($query, $validatedFilters, $urlParams);

        return $query->with($eagerLoaded)->get();


    }

    /**
     * 
     */
    public function store(Request $request)
    {
        return $this->model->create($request->all());
    }

    /**
     * 
     */
    public function show($id)
    {

    }

    /**
     * 
     */
    public function update(Request $request, $id)
    {

    }


    /**
     * 
     */
    public function destroy($id)
    {

    }

    public function parseUrlParams()
    {
        // api/cars?model=bmw
        $url =  \Request::getRequestUri();
        // get url parameters after "?"
        // parse_url contains query key
        $urlComponents = parse_url($url);

        if (isset($urlComponents['query'])) {

            parse_str($urlComponents['query'], $this->urlParams);

        }
    }

}