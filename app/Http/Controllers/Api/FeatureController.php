<?php

namespace App\Http\Controllers\Api;

use App\Models\Feature;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Requests\IntroductionRequest;
use App\Http\Resources\FeatureResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

class FeatureController extends ApiController
{
    public function __construct()
    {
        $this->resource = FeatureResource::class;
        $this->model = app(Feature::class);
        $this->repositry =  new Repository($this->model);
    }

    public function save( Request $request ){
        return $this->store( $request->all() );
    }

    public function edit($id,Request $request){


        return $this->update($id,$request->all());

    }


}
