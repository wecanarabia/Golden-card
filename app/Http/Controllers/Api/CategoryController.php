<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Requests\IntroductionRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ServiceResource;
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




    public function save( Request $request ){
        return $this->store( $request->all() );
    }

    public function edit($id,Request $request){


        return $this->update($id,$request->all());

    }


    public function getServicesBySubName($name){

        $sub = Category::where('name',$name)->first();
        if( $sub->services){

        return $this->returnData('data', ServiceResource::collection($sub->services), __('Get  succesfully'));
        }

        return $this->returnError(__('Sorry! Failed to get !'));

    }


    public function getServicesBySubNameOrCatName($name){

        $sub = Category::where('name',$name)->where('parent_id','!=',null)->first();
        if($sub && $sub->services){

        return $this->returnData('data', ServiceResource::collection($sub->services), __('Get  succesfully'));
        }


        $category = Category::where('name', $name)->where('parent_id', null)->first();

        $services = array(); // the best way right now for each cuze our time i will do it
        foreach (Service::all() as $service) {
            if ( $service?->subcategory?->parent?->name == $name ) {
                // dd($service?->subcategory?->parent?->name);
                array_push($services, $service);
            }
        }
        return $this->returnData('data', ServiceResource::collection($services), __('Get  succesfully'));


}
}
