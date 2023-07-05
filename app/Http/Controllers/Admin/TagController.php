<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagRequest;

class TagController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tag::latest()->get();
        return view('admin.tags.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        Tag::create($request->except([
            'english_name',
            'arabic_name',
        ]));


        return redirect()->route('admin.tags.index')
                        ->with('success','Tag has been added successfully');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tag = Tag::findOrFail($id);
        return view('admin.tags.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, string $id)
    {
        $tag = Tag::findOrFail($id);

        $request['name']=['en'=>$request->english_name,'ar'=>$request->arabic_name];
        $tag->update($request->except([
            'english_name',
            'arabic_name',
        ]));


        return redirect()->route('admin.tags.index')
                        ->with('success','Tag has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Tag::findOrFail($request->id)->delete();
        return redirect()->route('admin.tags.index')->with('success','Tag has been removed successfully');
    }
}
