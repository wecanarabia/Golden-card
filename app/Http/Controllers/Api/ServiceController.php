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
use Illuminate\Pagination\LengthAwarePaginator;

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

    public function services(){


        $data=Service::where('status',1)->get();
        return $this->returnData('data',  ServiceResource::collection( $data ), __('Get  succesfully'));

       }




    function distance($lat1, $lon1, $lat2, $lon2)
    {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;

        return $miles * 1.609344;
    }

//     public function searchS(Request $request)
//     {
//     $resources = [];
//   // if (isset($request->subs)) {
//     //     $subcategories = Subcategory::whereIn('id', $request->subs)->get();

//     //     foreach ($subcategories as $subcategory) {
//     //         foreach (Branch::all() as $branch) {
//     //             if ($branch->service->subcategories->contains($subcategory)) {
//     //                 $distance = $this->distance($request->lat_user, $request->long_user, $branch->lat, $branch->long);
//     //                 $resource = new BranchResource($branch, $distance);
//     //                 $resources[$branch->id] = $resource;
//     //             }
//     //         }
//     //     }
//     // }

//     if (isset($request->categories) && empty($request->areas) && empty($request->tags)) {
//         $categories = Category::whereIn('id', $request->categories)->get();

//         foreach ($categories as $category) {
//             foreach ($category->subcategories as $subcategory) {
//                 foreach ($subcategory->partners as $service) {
//                     foreach ($service->branches as $branch) {
//                         $distance = $this->distance($request->lat_user, $request->long_user, $branch->lat, $branch->long);
//                         $resource = new BranchResource($branch, $distance);
//                         $resources[$branch->id] = $resource;
//                     }
//                 }
//             }
//         }
//     }

//     if (isset($request->areas) && (empty($request->categories) || empty($request->tags))) {
//         $areas = Area::whereIn('id', $request->areas)->get();

//         foreach ($areas as $area) {
//             foreach ($area->branches as $branch) {
//                 if (empty($request->categories) || $branch->service->subcategories->pluck('category_id')->intersect($request->categories)->count() > 0) {
//                     if (empty($request->tags) || $branch->offers->pluck('tags')->flatten()->pluck('id')->intersect($request->tags)->count() === count($request->tags)) {
//                         $distance = $this->distance($request->lat_user, $request->long_user, $branch->lat, $branch->long);
//                         $resource = new BranchResource($branch, $distance);
//                         $resources[$branch->id] = $resource;
//                     }
//                 }
//             }
//         }
//     }

//     if (isset($request->categories) && isset($request->areas) && isset($request->tags)) {
//         $categories = Category::whereIn('id', $request->categories)->get();
//         $areas = Area::whereIn('id', $request->areas)->get();
//         $tags = Tag::whereIn('id', $request->tags)->get();

//         foreach ($areas as $area) {
//             foreach ($area->branches as $branch) {
//                 $serviceSubcategories = $branch->service->subcategories;

//                 $matchingCategories = $categories->filter(function ($category) use ($serviceSubcategories) {
//                     return $serviceSubcategories->pluck('category_id')->contains($category->id);
//                 });

//                 if ($matchingCategories->count() === count($request->categories)) {
//                     $branchTags = $branch->offers->pluck('tags')->flatten()->pluck('id');
//                     if ($branchTags->intersect($request->tags)->count() === count($request->tags) && $branchTags->count() > 0) {
//                         $distance = $this->distance($request->lat_user, $request->long_user, $branch->lat, $branch->long);
//                         $resource = new BranchResource($branch, $distance);
//                         $resources[$branch->id] = $resource;
//                     }
//                 }
//             }
//         }
//     }

//     if (isset($request->tags) && empty($request->categories) && empty($request->areas)) {
//         $tags = Tag::whereIn('id', $request->tags)->get();

//         foreach ($tags as $tag) {
//             foreach ($tag->offers as $offer) {
//                 foreach ($offer->branches as $branch) {
//                     $distance = $this->distance($request->lat_user, $request->long_user, $branch->lat, $branch->long);
//                     $resource = new BranchResource($branch, $distance);
//                     $resources[$branch->id] = $resource;
//                 }
//             }
//         }
//     }

//     if (empty($request->areas) && !empty($request->categories) && !empty($request->tags)) {
//         $categories = Category::whereIn('id', $request->categories)->get();
//         $tags = Tag::whereIn('id', $request->tags)->get();

//         foreach ($categories as $category) {
//             foreach ($category->subcategories as $subcategory) {
//                 foreach ($subcategory->partners as $service) {
//                     foreach ($service->branches as $branch) {
//                         $branchTags = $branch->offers->pluck('tags')->flatten()->pluck('id');
//                         if ($branchTags->intersect($request->tags)->count() === count($request->tags) && $branchTags->count() > 0) {
//                             $distance = $this->distance($request->lat_user, $request->long_user, $branch->lat, $branch->long);
//                             $resource = new BranchResource($branch, $distance);
//                             $resources[$branch->id] = $resource;
//                         }
//                     }
//                 }
//             }
//         }
//     }

//     if (isset($request->features)) {
//         $features = Feature::whereIn('id', $request->features)->get();

//         foreach ($features as $feature) {
//             $category = $feature->category;
//             if ($category) {
//                 $categorySubcategories = $category->subcategories;
//                 foreach ($categorySubcategories as $subcategory) {
//                     $services = $subcategory->partners;
//                     foreach ($services as $service) {
//                         foreach ($service->branches as $branch) {
//                             $branchTags = $branch->offers->pluck('tags')->flatten()->pluck('id');
//                             if (empty($request->categories) || $branch->service->subcategories->pluck('category_id')->intersect($request->categories)->count() > 0) {
//                                 if (empty($request->tags) || $branchTags->intersect($request->tags)->count() === count($request->tags)) {
//                                     $distance = $this->distance($request->lat_user, $request->long_user, $branch->lat, $branch->long);
//                                     $resource = new BranchResource($branch, $distance);
//                                     $resources[$branch->id] = $resource;
//                                 }
//                             }
//                         }
//                     }
//                 }
//             }
//         }
//     }


//     if (!empty($resources)) {
//         $resources = collect($resources)->sortBy('distance');
//         $perPage = 10;
//         $currentPage = $request->has('page') ? (int) $request->page : 1;
//         $offset = ($currentPage - 1) * $perPage;
//         $paginatedResources = array_slice($resources->all(), $offset, $perPage);

//         return $this->returnData('data', $paginatedResources, __('Get branches successfully'));
//     }

//     return $this->returnError(__('Sorry! Failed to get branches'));
// }


// public function searchS(Request $request)
// {
//     $resources = [];

//     $query = Branch::query();

//     $tagIds = $request->tags;
//     $featureIds = $request->features;
//     $categoryIds = $request->categories;
//     $areaIds = $request->areas;

//     if ($tagIds && $featureIds && empty($categoryIds) && empty($areaIds)) {
//         // Return all branches based on tags and features
//         $tagQuery = Branch::whereHas('offers.tags', function ($tagSubquery) use ($tagIds) {
//             $tagSubquery->whereIn('tags.id', $tagIds);
//         });

//         $featureQuery = Branch::whereHas('service.subcategories.category.features', function ($featureSubquery) use ($featureIds) {
//             $featureSubquery->whereIn('features.id', $featureIds);
//         });

//         $branches = $tagQuery->orWhereIn('id', $featureQuery->pluck('id'))->get();
//     } else {
//         if ($tagIds) {
//             $query->whereHas('offers.tags', function ($tagSubquery) use ($tagIds) {
//                 $tagSubquery->whereIn('tags.id', $tagIds);
//             });
//         }

//         if ($featureIds) {
//             $query->whereHas('service.subcategories.category.features', function ($featureSubquery) use ($featureIds) {
//                 $featureSubquery->whereIn('features.id', $featureIds);
//             });
//         }

//         if ($categoryIds) {
//             $query->whereHas('service.subcategories', function ($subquery) use ($categoryIds) {
//                 $subquery->whereIn('category_id', $categoryIds);
//             });
//         }

//         if ($areaIds) {
//             $query->whereIn('area_id', $areaIds);
//         }

//         $branches = $query->get();
//     }

//     $latUser = $request->lat_user;
//     $longUser = $request->long_user;
//     $perPage = $request->input('per_page', 10); // Number of results per page

//     $branches = $branches->sortBy(function ($branch) use ($latUser, $longUser) {
//         return $this->distance($latUser, $longUser, $branch->lat, $branch->long);
//     });

//     $currentPage = $request->input('page', 1);
//     $offset = ($currentPage - 1) * $perPage;
//     $paginatedBranches = new LengthAwarePaginator(
//         $branches->slice($offset, $perPage),
//         $branches->count(),
//         $perPage,
//         $currentPage,
//         ['path' => $request->url(), 'query' => $request->query()]
//     );

//     foreach ($paginatedBranches as $branch) {
//         $distance = $this->distance($latUser, $longUser, $branch->lat, $branch->long);
//         $resource = new BranchResource($branch, $distance);
//         $resources[] = $resource;
//     }

//     return $this->returnData('data', $resources, __('Get branches successfully'));
// }

public function searchS(Request $request)
{
    $resources = [];

    $query = Branch::query();

    $tagIds = $request->tags;
    $featureIds = $request->features;
    $categoryIds = $request->categories;
    $areaIds = $request->areas;

    if ($tagIds && $featureIds && empty($categoryIds) && empty($areaIds)) {
        // Return all branches based on tags and features
        $tagQuery = Branch::whereHas('offers.tags', function ($tagSubquery) use ($tagIds) {
            $tagSubquery->whereIn('tags.id', $tagIds);
        });

        $featureQuery = Branch::whereHas('service.subcategories.category.features', function ($featureSubquery) use ($featureIds) {
            $featureSubquery->whereIn('features.id', $featureIds);
        });

        $branches = $tagQuery->orWhereIn('id', $featureQuery->pluck('id'))->get();
    } else {
        if ($tagIds) {
            $query->whereHas('offers.tags', function ($tagSubquery) use ($tagIds) {
                $tagSubquery->whereIn('tags.id', $tagIds);
            });
        }

        if ($featureIds) {
            $query->whereHas('service.subcategories.category.features', function ($featureSubquery) use ($featureIds) {
                $featureSubquery->whereIn('features.id', $featureIds);
            });
        }

        if ($categoryIds) {
            $query->whereHas('service.subcategories', function ($subquery) use ($categoryIds) {
                $subquery->whereIn('category_id', $categoryIds);
            });
        }

        if ($areaIds) {
            $query->whereIn('area_id', $areaIds);
        }

        $branches = $query->get();
    }

    // Filter branches belonging to services with status 1
    $branches = $branches->filter(function ($branch) {
        return $branch->service->status == 1;
    });

    $latUser = $request->lat_user;
    $longUser = $request->long_user;
    $perPage = $request->input('per_page', 10); // Number of results per page

    $branches = $branches->sortBy(function ($branch) use ($latUser, $longUser) {
        return $this->distance($latUser, $longUser, $branch->lat, $branch->long);
    });

    $currentPage = $request->input('page', 1);
    $offset = ($currentPage - 1) * $perPage;
    $paginatedBranches = new LengthAwarePaginator(
        $branches->slice($offset, $perPage),
        $branches->count(),
        $perPage,
        $currentPage,
        ['path' => $request->url(), 'query' => $request->query()]
    );

    foreach ($paginatedBranches as $branch) {
        $distance = $this->distance($latUser, $longUser, $branch->lat, $branch->long);
        $resource = new BranchResource($branch, $distance);
        $resources[] = $resource;
    }

    return $this->returnData('data', $resources, __('Get branches successfully'));
}

// public function searchInCatOrSub(Request $request)
// {

//        //filter in specific category
//  if($request->is_category == 1){
//     $resources = [];

//     $query = Branch::query();

//     $tagIds = $request->tags;
//     $featureIds = $request->features;
//     $categoryId = $request->category_id;

//     if ($tagIds) {
//         $query->whereHas('offers.tags', function ($tagSubquery) use ($tagIds) {
//             $tagSubquery->whereIn('tags.id', $tagIds);
//         });
//     }

//     if ($featureIds) {
//         $query->whereHas('service.subcategories.category.features', function ($featureSubquery) use ($featureIds) {
//             $featureSubquery->whereIn('features.id', $featureIds);
//         });
//     }

//     if ($categoryId) {
//         $query->where(function ($categorySubquery) use ($categoryId) {
//             $categorySubquery
//                 ->whereHas('service.subcategories.category', function ($subCategorySubquery) use ($categoryId) {
//                     $subCategorySubquery->where('categories.id', $categoryId);
//                 })
//                 ->orWhereHas('offers.tags', function ($tagSubquery) use ($categoryId) {
//                     $tagSubquery->where('tags.id', $categoryId);
//                 });
//         });
//     }

//     if ($request->filled('areas')) {
//         $areaIds = $request->areas;
//         $query->whereIn('area_id', $areaIds);
//     }

//     $latUser = $request->lat_user;
//     $longUser = $request->long_user;
//     $perPage = $request->input('per_page', 10); // Number of results per page

//     $branches = $query->get()->sortBy(function ($branch) use ($latUser, $longUser) {
//         return $this->distance($latUser, $longUser, $branch->lat, $branch->long);
//     });

//     $currentPage = $request->input('page', 1);
//     $offset = ($currentPage - 1) * $perPage;
//     $paginatedBranches = new LengthAwarePaginator(
//         $branches->slice($offset, $perPage),
//         $branches->count(),
//         $perPage,
//         $currentPage,
//         ['path' => $request->url(), 'query' => $request->query()]
//     );

//     foreach ($paginatedBranches as $branch) {
//         $distance = $this->distance($latUser, $longUser, $branch->lat, $branch->long);
//         $resource = new BranchResource($branch, $distance);
//         $resources[] = $resource;
//     }

//     return $this->returnData('data', $resources, __('Get branches successfully'));

// }

//    //filter in specific subcategory
//    if($request->is_category == 0){

//     $resources = [];

//     $query = Branch::query();

//     $tagIds = $request->tags;
//     $featureIds = $request->features;
//     $subcategoryId = $request->subcategory_id;

//     if ($tagIds) {
//         $query->whereHas('offers.tags', function ($tagSubquery) use ($tagIds) {
//             $tagSubquery->whereIn('tags.id', $tagIds);
//         });
//     }

//     if ($featureIds) {
//         $query->whereHas('service.subcategories.category.features', function ($featureSubquery) use ($featureIds) {
//             $featureSubquery->whereIn('features.id', $featureIds);
//         });
//     }

//     if ($subcategoryId) {
//         $query->where(function ($subcategorySubquery) use ($subcategoryId) {
//             $subcategorySubquery
//                 ->whereHas('service.subcategories', function ($subquery) use ($subcategoryId) {
//                     $subquery->where('subcategories.id', $subcategoryId);
//                 })
//                 ->orWhereHas('offers.tags', function ($tagSubquery) use ($subcategoryId) {
//                     $tagSubquery->where('tags.id', $subcategoryId);
//                 });
//         });
//     }

//     if ($request->filled('areas')) {
//         $areaIds = $request->areas;
//         $query->whereIn('area_id', $areaIds);
//     }

//     $latUser = $request->lat_user;
//     $longUser = $request->long_user;
//     $perPage = $request->input('per_page', 10); // Number of results per page

//     $branches = $query->get()->sortBy(function ($branch) use ($latUser, $longUser) {
//         return $this->distance($latUser, $longUser, $branch->lat, $branch->long);
//     });

//     $currentPage = $request->input('page', 1);
//     $offset = ($currentPage - 1) * $perPage;
//     $paginatedBranches = new LengthAwarePaginator(
//         $branches->slice($offset, $perPage),
//         $branches->count(),
//         $perPage,
//         $currentPage,
//         ['path' => $request->url(), 'query' => $request->query()]
//     );

//     foreach ($paginatedBranches as $branch) {
//         $distance = $this->distance($latUser, $longUser, $branch->lat, $branch->long);
//         $resource = new BranchResource($branch, $distance);
//         $resources[] = $resource;
//     }

//     return $this->returnData('data', $resources, __('Get branches successfully'));


//    }

// }

public function searchInCatOrSub(Request $request)
{

       //filter in specific category
 if($request->is_category == 1){
    $resources = [];

    $query = Branch::query();

    $tagIds = $request->tags;
    $featureIds = $request->features;
    $categoryId = $request->category_id;

    if ($tagIds) {
        $query->whereHas('offers.tags', function ($tagSubquery) use ($tagIds) {
            $tagSubquery->whereIn('tags.id', $tagIds);
        });
    }

    if ($featureIds) {
        $query->whereHas('service.subcategories.category.features', function ($featureSubquery) use ($featureIds) {
            $featureSubquery->whereIn('features.id', $featureIds);
        });
    }

    if ($categoryId) {
        $query->where(function ($categorySubquery) use ($categoryId) {
            $categorySubquery
                ->whereHas('service.subcategories.category', function ($subCategorySubquery) use ($categoryId) {
                    $subCategorySubquery->where('categories.id', $categoryId);
                })
                ->orWhereHas('offers.tags', function ($tagSubquery) use ($categoryId) {
                    $tagSubquery->where('tags.id', $categoryId);
                });
        });
    }

    if ($request->filled('areas')) {
        $areaIds = $request->areas;
        $query->whereIn('area_id', $areaIds);
    }

    $latUser = $request->lat_user;
    $longUser = $request->long_user;
    $perPage = $request->input('per_page', 10); // Number of results per page

    $branches = $query->get()->sortBy(function ($branch) use ($latUser, $longUser) {
        return $this->distance($latUser, $longUser, $branch->lat, $branch->long);
    });

    $branches = $branches->filter(function ($branch) {
        return $branch->service->status == 1;
    });


    $currentPage = $request->input('page', 1);
    $offset = ($currentPage - 1) * $perPage;
    $paginatedBranches = new LengthAwarePaginator(
        $branches->slice($offset, $perPage),
        $branches->count(),
        $perPage,
        $currentPage,
        ['path' => $request->url(), 'query' => $request->query()]
    );

    foreach ($paginatedBranches as $branch) {
        $distance = $this->distance($latUser, $longUser, $branch->lat, $branch->long);
        $resource = new BranchResource($branch, $distance);
        $resources[] = $resource;
    }

    return $this->returnData('data', $resources, __('Get branches successfully'));

}

   //filter in specific subcategory
   if($request->is_category == 0){

    $resources = [];

    $query = Branch::query();

    $tagIds = $request->tags;
    $featureIds = $request->features;
    $subcategoryId = $request->subcategory_id;

    if ($tagIds) {
        $query->whereHas('offers.tags', function ($tagSubquery) use ($tagIds) {
            $tagSubquery->whereIn('tags.id', $tagIds);
        });
    }

    if ($featureIds) {
        $query->whereHas('service.subcategories.category.features', function ($featureSubquery) use ($featureIds) {
            $featureSubquery->whereIn('features.id', $featureIds);
        });
    }

    if ($subcategoryId) {
        $query->where(function ($subcategorySubquery) use ($subcategoryId) {
            $subcategorySubquery
                ->whereHas('service.subcategories', function ($subquery) use ($subcategoryId) {
                    $subquery->where('subcategories.id', $subcategoryId);
                })
                ->orWhereHas('offers.tags', function ($tagSubquery) use ($subcategoryId) {
                    $tagSubquery->where('tags.id', $subcategoryId);
                });
        });
    }

    if ($request->filled('areas')) {
        $areaIds = $request->areas;
        $query->whereIn('area_id', $areaIds);
    }

    $latUser = $request->lat_user;
    $longUser = $request->long_user;
    $perPage = $request->input('per_page', 10); // Number of results per page

    $branches = $query->get()->sortBy(function ($branch) use ($latUser, $longUser) {
        return $this->distance($latUser, $longUser, $branch->lat, $branch->long);
    });

    $branches = $branches->filter(function ($branch) {
        return $branch->service->status == 1;
    });


    $currentPage = $request->input('page', 1);
    $offset = ($currentPage - 1) * $perPage;
    $paginatedBranches = new LengthAwarePaginator(
        $branches->slice($offset, $perPage),
        $branches->count(),
        $perPage,
        $currentPage,
        ['path' => $request->url(), 'query' => $request->query()]
    );

    foreach ($paginatedBranches as $branch) {
        $distance = $this->distance($latUser, $longUser, $branch->lat, $branch->long);
        $resource = new BranchResource($branch, $distance);
        $resources[] = $resource;
    }

    return $this->returnData('data', $resources, __('Get branches successfully'));


   }

}


    public function searchBranches(Request $request)
    {
        $params = $request->all();
        $lat_user = Auth::user()->lat;
        $long_user = Auth::user()->long;

        $resources = [];

        // Search by subcategory ID or name
        if (isset($params['id'])) {
            $subId = $params['id'];
            $sub = Category::where('id', $subId)->first();
            if ($sub) {
                $services = $sub->services;
            } else {
                return $this->returnData('data', [], __('No services or subcategories found'));
            }
        } else {
            $sub = Category::where('name', 'like', '%' . $params['name'] . '%')
                ->where('parent_id', '!=', null)
                ->first();
            if ($sub) {
                $services = $sub->services;
            } else {
                $service = Service::where('name', 'like', '%' . $params['name'] . '%')->first();
                if ($service) {
                    $services = [$service];
                } else {
                    return $this->returnData('data', [], __('No services or subcategories found'));
                }
            }
        }

        // Retrieve branches for each service
        foreach ($services as $service) {
            $serviceBranches = $service->branches;

            foreach ($serviceBranches as $branch) {
                $distance = $this->distance($lat_user, $long_user, $branch->lat, $branch->long);

                $resource = new BranchResource($branch, $distance);

                $resources[] = $resource;
            }
        }

        // Filter by categories, areas, features, and tags
        if (isset($params['categories'])) {
            $categories = Category::where('parent_id', null)->whereIn('id', $params['categories'])->get();
            $branches = Branch::whereIn('service.subcategory.parentcategory.id', $params['categories'])->get();
            foreach ($branches as $branch) {
                $distance = $this->distance($lat_user, $long_user, $branch->lat, $branch->long);
                $resource = new BranchResource($branch, $distance);
                $resources[] = $resource;
            }
        }
        if (isset($params['areas'])) {
            $branches = Branch::whereIn('area.id', $params['areas'])->get();
            foreach ($branches as $branch) {
                $distance = $this->distance($lat_user, $long_user, $branch->lat, $branch->long);
                $resource = new BranchResource($branch, $distance);
                $resources[] = $resource;
            }
        }
        if (isset($params['features'])) {
            $features = Feature::whereIn('id', $params['features'])->get();
            foreach ($features as $feature) {
                $category = Category::find($feature->category->id);
                $subs = $category->subcategories;
                foreach ($subs as $sub) {
                    $services = $sub->services;
                    foreach ($services as $service) {
                        foreach ($service->branches as $branch) {
                            $distance = $this->distance($lat_user, $long_user, $branch->lat, $branch->long);
                            $resource = new BranchResource($branch, $distance);
                            $resources[] = $resource;
                        }
                    }
                }
            }
        }
        if (isset($params['tags'])) {
            $offers = Offer::whereIn('tag.id', $params['tags'])->get();
            foreach ($offers as $offer) {
                $branches = $offer->branches;
                foreach ($branches as $branch) {
                    $distance = $this->distance($lat_user, $long_user, $branch->lat, $branch->long);
                    $resource = new BranchResource($branch, $distance);
                    $resources[] = $resource;
                }
            }
        }

        // Sort and paginate the results
        if (!empty($resources)) {
            $sortedResources = collect($resources)->sortBy('distance');
            $perPage = 10;
            $currentPage = $params['page'] ?? 1;
            $offset = ($currentPage - 1) * $perPage;
            $paginatedResources = array_slice($sortedResources->all(), $offset, $perPage);

            return $this->returnData('data', $paginatedResources, __('Get branches successfully'));
        }
    }


}
