<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';

    protected $fillable = [
        'model_id', 'make_id', 'year', 'price', 'description', 'photo'
    ];
    
    public $_queryFilters = [
        'model_id', 'make_id'
    ];

    public $_eagerLoaded = [
        'make', 'model',
    ];

    public function make()
    {
        return $this->belongsTo('App\Repository', 'make_id', 'id');
    }

    public function model()
    {
        return $this->belongsTo('App\Repository', 'model_id', 'id');
    }

}
