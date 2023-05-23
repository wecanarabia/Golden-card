<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubscriptionRequest;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Subscription::paginate(5);
        return view('admin.subscriptions.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.subscriptions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubscriptionRequest $request)
    {
        Subscription::create($request->all());


        return redirect()->route('admin.subscriptions.index')
                        ->with('success','subscription has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subscription = Subscription::findOrFail($id);
        return view('admin.subscriptions.show',compact('subscription'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subscription = Subscription::findOrFail($id);
        return view('admin.subscriptions.edit',compact('subscription'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubscriptionRequest $request, string $id)
    {
        $subscription = Subscription::findOrFail($id);

        $subscription->update($request->all());


        return redirect()->route('admin.subscriptions.index')
                        ->with('success','subscription has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Subscription::findOrFail($request->id)->delete();
        return redirect()->route('admin.subscriptions.index')->with('success','subscription has been removed successfully');
    }
}
