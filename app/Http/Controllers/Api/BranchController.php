<?php

namespace App\Http\Controllers\Api;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Requests\ServiceRequest;
use App\Http\Resources\BranchResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

class BranchController extends ApiController
{
    public function __construct()
    {
        $this->resource = BranchResource::class;
        $this->model = app(Branch::class);
        $this->repositry =  new Repository($this->model);
    }

    public function save( Request $request ){
        return $this->store( $request->all() );
    }

    public function edit($id,Request $request){


        return $this->update($id,$request->all());

    }
}
