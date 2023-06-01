<?php

namespace App\Http\Controllers\Admin;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NotificationRequest;
use App\Models\User;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Notification::with('user')->latest()->paginate(10);
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
        $request['title']=['en'=>$request->english_title,'ar'=>$request->arabic_title];
        $request['body']=['en'=>$request->english_body,'ar'=>$request->arabic_body];
        Notification::create($request->except([
            'english_title',
            'arabic_title',
            'english_body',
            'arabic_body',
        ]));


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
