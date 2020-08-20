<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait EloquentHelpers {

    public function filterQuery($query, $validatedFilters, $filters) 
    {

        foreach($validatedFilters as $filterKey) {
                        
            if ( !\is_array($filters[$filterKey]) ) {

                $value = "%".$filters[$filterKey]."%";
                $query->where($filterKey, 'like', $value);

            } else {
                $query->whereIn($filterKey, $filters[$filterKey]);
            }

        }

        return $query;

    }
    

    /**
     * Undocumented function
     *
     * @return void
     */
    public function firstOrCreate(Model $model, $params = [], $request = [])
    {
        return $model::firstOrCreate(
            $params, 
            $request
        );
    }
}