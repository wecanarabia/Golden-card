<?php

namespace App\Http\Controllers\Admin;

use App\Models\PromoCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PromoCodeRequest;

class PromoCodeController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PromoCode::latest()->get();
        return view('admin.promo-codes.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.promo-codes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PromoCodeRequest $request)
    {

        PromoCode::create($request->all());


        return redirect()->route('admin.promo-codes.index')
                        ->with('success','Promo Code has been added successfully');
    }


    public function show(string $id)
    {
        $code = PromoCode::findOrFail($id);
        return view('admin.promo-codes.show',compact('code'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $code = PromoCode::findOrFail($id);
        return view('admin.promo-codes.edit',compact('code'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PromoCodeRequest $request, string $id)
    {
        $code = PromoCode::findOrFail($id);


        $code->update($request->all());


        return redirect()->route('admin.promo-codes.index')
                        ->with('success','Promo Code has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        PromoCode::findOrFail($request->id)->delete();
        return redirect()->route('admin.promo-codes.index')->with('success','Promo Code has been removed successfully');
    }
}
