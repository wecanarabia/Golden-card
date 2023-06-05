<?php

namespace App\Http\Controllers\Api;

use App\Models\Service;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Area;
use App\Models\Branch;
use App\Models\Feature;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Requests\ServiceRequest;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\BranchResource;
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






    function distance($lat1, $lon1, $lat2, $lon2)
    {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;

        return ($miles * 1.609344) * 1000;
    }



    public function searchS(Request $request)
    {
        $lat_user = Auth::user()->lat;
        $long_user = Auth::user()->long;

        $resources = [];

        if (isset($request->categories)) {
            $categories = Category::where('parent_id', null)->get();

            foreach ($request->categories as $category) {
                foreach (Branch::all() as $branch) {
                    if ($branch->service?->subcategory?->parentcategory?->id == $category) {
                        $distance = $this->distance($lat_user, $long_user, $branch->lat, $branch->long);
                        $resource = new BranchResource($branch, $distance);
                        $resources[$branch->id] = $resource;
                    }
                }
            }
        }

        if (isset($request->areas)) {
            $areas = Area::all();
            foreach ($request->areas as $area) {
                foreach (Branch::all() as $branch) {
                    if ($branch?->area?->id == $area) {
                        $distance = $this->distance($lat_user, $long_user, $branch->lat, $branch->long);
                        $resource = new BranchResource($branch, $distance);
                        $resources[$branch->id] = $resource;
                    }
                }
            }
        }

        if (isset($request->features)) {
            $features = Feature::all();
            foreach ($request->features as $feature) {
                foreach ($features as $f) {
                    if ($f->id == $feature) {
                        $category = Category::find($f->category->id);
                        $subs = $category->subcategories;
                        foreach ($subs as $sub) {
                            $services = $sub->services;
                            foreach ($services as $service) {
                                foreach ($service->branches as $branch) {
                                    $distance = $this->distance($lat_user, $long_user, $branch->lat, $branch->long);
                                    $resource = new BranchResource($branch, $distance);
                                    $resources[$branch->id] = $resource;
                                }
                            }
                        }
                    }
                }
            }
        }

        if (isset($request->tags)) {
            $tags = Tag::all();
            foreach ($request->tags as $tag) {
                foreach ($tags as $t) {
                    if ($t->id == $tag) {
                        $offers = $t->offers;
                        foreach ($offers as $off) {
                            $branches = $off->branches;
                            foreach ($branches as $branch) {
                                    $distance = $this->distance($lat_user, $long_user, $branch->lat, $branch->long);
                                    $resource = new BranchResource($branch, $distance);
                                    $resources[$branch->id] = $resource;
                                }
                            }
                        }
                    }
                }

        }

        // if (!empty($resources)) {
        //     $resources = array_values($resources);
        //     usort($resources, function ($a, $b) {
        //         return $a->distance <=> $b->distance;
        //     });
        //     return $this->returnData('data', $resources, __('Get branches successfully'));
        // }


        if (!empty($resources)) {
            $resources = collect($resources)->sortBy('distance');
            $perPage = 10;
            $currentPage = $request->has('page') ? (int) $request->page : 1;
            $offset = ($currentPage - 1) * $perPage;
            $paginatedResources = array_slice($resources->all(), $offset, $perPage);

            return $this->returnData('data', $paginatedResources, __('Get branches successfully'));
        }

        return $this->returnError(__('Sorry! Failed to get branches'));
    }
}
