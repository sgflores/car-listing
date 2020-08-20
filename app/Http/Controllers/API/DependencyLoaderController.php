<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\EloquentHelpers;
use Illuminate\Support\Facades\Config;

class DependencyLoaderController extends Controller
{
    use EloquentHelpers;

    public function loadDependencies(Request $request)
    {
        $results = [];
        $models = $request->models;

        if ( $models && \is_array($models)) {
            foreach($models as $key => $model){

                $class = 'App\\'.$model['name'];
                $filters = $model['filters'] ?? [];

                if (\class_exists($class)) {

                    $model = new $class;

                    $validFilters = $model->_queryFilters ?? [];

                    // validate filters
                    $validatedFilters = array_intersect(array_keys($filters), $validFilters);

                    $query = $model::query();

                    $query = $this->filterQuery($query, $validatedFilters, $filters);

                    $results[] = $query->get();

                }

            }

        }

        return response($results, 200);
    }
}
