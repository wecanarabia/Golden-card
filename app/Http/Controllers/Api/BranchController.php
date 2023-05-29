<?php

namespace App\Http\Controllers\Api;

use App\Models\Branch;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Requests\ServiceRequest;
use App\Http\Resources\BranchResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;

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


    public function nearbyBranches()
    {
        $lat_user = Auth::user()->lat;
        $long_user = Auth::user()->long;

        $branches = Branch::all();

        $resources = [];

        foreach ($branches as $branch) {
            $distance = $this->distance($lat_user, $long_user, $branch->lat, $branch->long);

            $resource = new BranchResource($branch, $distance);

            $resources[] = $resource;
        }

        // Sort the resources by their distance from the user's location
        usort($resources, function($a, $b) {
            return $a->distance <=> $b->distance;
        });

        return $this->returnData('data', $resources, __('Get nearby branches successfully'));
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


    public function getBranchesBySubName($id)
    {
        $lat_user = Auth::user()->lat;
        $long_user = Auth::user()->long;

        $sub = Category::where('id', $id)->first();

        if ($sub) {
            $services = $sub->services;

            $resources = [];

            foreach ($services as $service) {
                $serviceBranches = $service->branches;

                foreach ($serviceBranches as $branch) {
                    $distance = $this->distance($lat_user, $long_user, $branch->lat, $branch->long);

                    $resource = new BranchResource($branch, $distance);

                    $resources[] = $resource;
                }
            }

            // Sort the resources by their distance from the user's location
            usort($resources, function($a, $b) {
                return $a->distance <=> $b->distance;
            });

            return $this->returnData('data', array_values($resources), __('Get branches successfully'));
        }

        return $this->returnError(__('Sorry! Failed to get branches'));
    }


    // public function getBranchesBySubNameOrCatName($name)
    // {
    //     $lat_user = Auth::user()->lat;
    //     $long_user = Auth::user()->long;

    //     $sub = Category::where( 'name', 'like', '%' . $name . '%' )->where('parent_id', '!=', null)->first();

    //     if ($sub) {
    //         $services = $sub->services;
    //         $resources = [];

    //         $branches = collect();
    //         foreach ($services as $service) {
    //             $serviceBranches = $service->branches;
    //             foreach ($serviceBranches as $branch) {
    //                 $distance = $this->distance($lat_user, $long_user, $branch->lat, $branch->long);
    //                 $resource = new BranchResource($branch, $distance);

    //                 $resources[] = $resource;
    //             }
    //         }

    //         // Remove duplicate branches and sort them by distance
    //         usort($resources, function($a, $b) {
    //             return $a->distance <=> $b->distance;
    //         });

    //         return $this->returnData('data', array_values($resources), __('Get branches successfully'));
    //     }
    //         $category = Category::where( 'name', 'like', '%' . $name . '%' )->where('parent_id', null)->first();


    //         if ($category) {

    //             $branches = collect();
    //             $resources = [];
    //             foreach (Branch::all() as $branch) {
    //                 if ($branch->service?->subcategory?->parent?->name ==$name) {

    //                     $distance = $this->distance($lat_user, $long_user, $branch->lat, $branch->long);
    //                     $resource = new BranchResource($branch, $distance);

    //                     $resources[] = $resource;
    //                 }
    //             }

    //                 usort($resources, function($a, $b) {
    //                     return $a->distance <=> $b->distance;
    //                 });

    //                 return $this->returnData('data', array_values($resources), __('Get branches successfully'));
    //         } else {
    //             // If the name doesn't match any subcategory or category, return an error response
    //             return $this->returnError(__('Invalid name'));
    //         }


    // }


    public function getBranchesBySubNameOrServiceName($name)
    {
        $lat_user = Auth::user()->lat;
        $long_user = Auth::user()->long;

        $sub = Category::where( 'name', 'like', '%' . $name . '%' )->where('parent_id', '!=', null)->first();

        if ($sub) {
            $services = $sub->services;
            $resources = [];

            $branches = collect();
            foreach ($services as $service) {
                $serviceBranches = $service->branches;
                foreach ($serviceBranches as $branch) {
                    $distance = $this->distance($lat_user, $long_user, $branch->lat, $branch->long);
                    $resource = new BranchResource($branch, $distance);

                    $resources[] = $resource;
                }
            }

            // Remove duplicate branches and sort them by distance
            usort($resources, function($a, $b) {
                return $a->distance <=> $b->distance;
            });

            return $this->returnData('data', array_values($resources), __('Get branches successfully'));
        }
            $service = Service::where( 'name', 'like', '%' . $name . '%' )->first();



            if ($service) {

                $branches = $service->branches;
                $resources = [];


                foreach ($branches as $branch) {
                    $distance = $this->distance($lat_user, $long_user, $branch->lat, $branch->long);
                    $resource = new BranchResource($branch, $distance);

                    $resources[] = $resource;
                }



                    usort($resources, function($a, $b) {
                        return $a->distance <=> $b->distance;
                    });

                    return $this->returnData('data', array_values($resources), __('Get branches successfully'));
            } else {
                // If the name doesn't match any subcategory or category, return an error response
                return $this->returnError(__('Invalid name'));
            }


    }

}
