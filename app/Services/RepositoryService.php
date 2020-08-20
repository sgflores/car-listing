<?php
namespace App\Services\UserServices;

use App\Repository;
use Illuminate\Http\Request;
use App\Services\BaseService;
use App\Services\RepositoryInterface;
use Illuminate\Support\Facades\DB;

class RepositoryService extends BaseService implements RepositoryInterface {

    public $model;

    public function __construct()
    {
        parent::__construct(new Repository);
    }

    
}