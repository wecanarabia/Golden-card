<?php

namespace App\Http\Controllers\Admin;

use App\Models\Introduction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\IntroductionRequest;

class IntroductionController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Introduction::paginate(5);
        return view('admin.introductions.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.introductions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IntroductionRequest $request)
    {
        $request['title']=['en'=>$request->english_title,'ar'=>$request->arabic_title];
        $request['body']=['en'=>$request->english_body,'ar'=>$request->arabic_body];
        Introduction::create($request->except([
            'english_title',
            'arabic_title',
            'english_body',
            'arabic_body',
        ]));


        return redirect()->route('admin.introductions.index')
                        ->with('success','Introduction has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $introduction = Introduction::findOrFail($id);
        return view('admin.introductions.show',compact('introduction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $introduction = Introduction::findOrFail($id);
        return view('admin.introductions.edit',compact('introduction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IntroductionRequest $request, string $id)
    {
        $introduction = Introduction::findOrFail($id);
        if ($request->has('image')&&$introduction->image  && File::exists($introduction->image)) {
            unlink($introduction->image);
        }
        $request['title']=['en'=>$request->english_title,'ar'=>$request->arabic_title];
        $request['body']=['en'=>$request->english_body,'ar'=>$request->arabic_body];
        $introduction->update($request->except([
            'english_title',
            'arabic_title',
            'english_body',
            'arabic_body',
        ]));


        return redirect()->route('admin.introductions.index')
                        ->with('success','Introduction has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Introduction::findOrFail($request->id)->delete();
        return redirect()->route('admin.introductions.index')->with('success','Introduction has been removed successfully');
    }
}
