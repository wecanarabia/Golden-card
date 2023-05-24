<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Requests\IntroductionRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

class CategoryController extends ApiController
{
    public function __construct()
    {
        $this->resource = CategoryResource::class;
        $this->model = app(Category::class);
        $this->repositry =  new Repository($this->model);
    }


    public function categories(){


        $sub = Category::where('parent_id',null)->get();

        return $this->returnData('data', $this->resource::collection($sub), __('Get  succesfully'));
    }

    public function save( Request $request ){
        return $this->store( $request->all() );
    }

    public function edit($id,Request $request){


        return $this->update($id,$request->all());

    }


}