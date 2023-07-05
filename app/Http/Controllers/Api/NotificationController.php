<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Resources\NotificationResource;
use App\Models\Notification;
use App\Models\User;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NotificationController extends ApiController
{


    public function __construct()
    {
        $this->resource = NotificationResource::class;
        $this->model = app(Notification::class);
        $this->repositry = new Repository($this->model);
    }

    public function save(Request $request)
    {
        return $this->store($request->all());
    }

    public function edit($id, Request $request)
    {

        return $this->update($id, $request->all());

    }

    public function myNotifications()
    {


        // $notifications = Notification::where('user_id',Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        $notifications = Notification::orderBy('created_at', 'DESC')->get();
        return $this->returnData('data',  NotificationResource::collection( $notifications ), __('Get  succesfully'));

    }

}
