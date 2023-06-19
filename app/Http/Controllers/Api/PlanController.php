<?php

namespace App\Http\Controllers\Api;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Requests\PlanRequest;
use App\Http\Resources\PlanResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Carbon\Carbon;

class PlanController extends ApiController
{
    public function __construct()
    {
        $this->resource = PlanResource::class;
        $this->model = app(Plan::class);
        $this->repositry =  new Repository($this->model);
    }


    public function plans()
    {

        $plans = Plan::where('id','!=',4)->get();
        return $this->returnData('data',  PlanResource::collection( $plans ), __('Get  succesfully'));

    }


    public function save( Request $request ){
        return $this->store( $request->all() );
    }

    public function edit($id,Request $request){


        return $this->update($id,$request->all());

    }



    public function getCurrentDateTime()
{
    $date = date('Y-m-d');
    $time = date('H:i:s');
    $data = [
        'date' => $date,
        'time' => $time
    ];
    return $this->returnSuccessMessage($data);
}
}
