<?php

namespace App\Http\Controllers\Api;

use App\Models\ServiceSubcategory;
use App\Models\Service;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Resources\ServiceSubcategoryResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;


class ServiceSubcategoryController extends ApiController
{
    public function __construct()
    {
        $this->resource = ServiceSubcategoryResource::class;
        $this->model = app(ServiceSubcategory::class);
        $this->repositry =  new Repository($this->model);
    }

    public function save( Request $request ){

        $model = ServiceSubcategory::where('service_id',$request->service_id)->where('subcategory_id',$request->subcategory_id)->first();
        if($model){
            return $this->returnError(__('Sorry! It is already exist !'));
        }

        return $this->store( $request->all() );
    }








}
