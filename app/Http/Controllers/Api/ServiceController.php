<?php

namespace App\Http\Controllers\Api;

use App\Models\Service;
use App\Models\Category;
use App\Models\Area;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Requests\ServiceRequest;
use App\Http\Resources\ServiceResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;

class ServiceController extends ApiController
{
    public function __construct()
    {
        $this->resource = ServiceResource::class;
        $this->model = app(Service::class);
        $this->repositry =  new Repository($this->model);
    }

    public function save( Request $request ){
        return $this->store( $request->all() );
    }

    public function edit($id,Request $request){


        return $this->update($id,$request->all());

    }



    public function searchS(Request $request){

        $services = array();
        if (isset($request->categories)) {
            // $services = array();
             $categories = Category::all();
            foreach ($request->categories as $category) {
               foreach (Service::all() as $service) {
            if ( $service?->subcategory?->parent?->id == $category ) {
                // dd($service?->subcategory?->parent?->name);
                array_push($services, $service);
            }
        }
            }
        }


        if (isset($request->areas)) {
            // $services = array();
             $areas = Area::all();
            foreach ($request->areas as $area) {
                foreach (Branch::all() as $branch){
            if ( $branch?->area?->id == $area ) {
                // dd($branch?->area?->id);
                array_push($services, $branch->service);
            }
        }

            }

        }

        $services = collect($services)->unique('id')->values()->all();


        return $this->returnData('data', ServiceResource::collection($services), __('Get  succesfully'));



    }
}
