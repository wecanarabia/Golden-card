<?php

namespace App\Http\Controllers\Api;

use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Requests\FavoriteRequest;
use App\Http\Resources\FavoriteResource;
use App\Http\Resources\OfferResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;


class FavoriteController extends ApiController
{
    public function __construct()
    {
        $this->resource = FavoriteResource::class;
        $this->model = app(Favorite::class);
        $this->repositry =  new Repository($this->model);
    }

    public function save( Request $request ){

        $model = Favorite::where('offer_id',$request->offer_id)->where('user_id',$request->user_id)->first();

        if($model){
            return $this->returnError(__('Sorry! Offer already exist !'));
        }
        return $this->store( $request->all() );
    }

    public function myFavorites()
    {

        $favorites = Auth::user()->favorites;
        return $this->returnData('data',  OfferResource::collection( $favorites ), __('Get  succesfully'));

    }



}
