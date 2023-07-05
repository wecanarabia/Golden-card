<?php

namespace App\Http\Controllers\Admin;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NotificationRequest;
use App\Models\User;
use App\Traits\NotificationTrait;

class NotificationController extends Controller
{
    use NotificationTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Notification::with('user')->latest()->get();
        return view('admin.notifications.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('admin.notifications.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NotificationRequest $request)
    {
        $notification=Notification::create($request->all());
        // $FcmToken = User::pluck('device_token')->all();

        $this->send($notification->body, $notification->title,$notification->date_time, $many = true);


        return redirect()->route('admin.notifications.index')
                        ->with('success','Notification has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $notification = Notification::with('user')->findOrFail($id);
        return view('admin.notifications.show',compact('notification'));
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Notification::findOrFail($request->id)->delete();
        return redirect()->route('admin.notifications.index')->with('success','Notification has been removed successfully');
    }
}
