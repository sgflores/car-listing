<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    protected $table = 'repositories';

    protected $fillable = [
        'type', 'name'
    ];
    
    // valid query filters
    public $_queryFilters = [
        'id', 'type', 'name'
    ];

}
