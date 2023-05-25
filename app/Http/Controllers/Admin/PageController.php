<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageRequest;

class PageController extends Controller
{
/**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Page::paginate(10);
        return view('admin.pages.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PageRequest $request)
    {
        $request['title']=['en'=>$request->english_title,'ar'=>$request->arabic_title];
        $request['body']=['en'=>$request->english_body,'ar'=>$request->arabic_body];
        Page::create($request->except([
            'english_title',
            'arabic_title',
            'english_body',
            'arabic_body',
        ]));


        return redirect()->route('admin.pages.index')
                        ->with('success','Page has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $page = Page::findOrFail($id);
        return view('admin.pages.show',compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $page = Page::findOrFail($id);
        return view('admin.pages.edit',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PageRequest $request, string $id)
    {
        $page = Page::findOrFail($id);
        $request['title']=['en'=>$request->english_title,'ar'=>$request->arabic_title];
        $request['body']=['en'=>$request->english_body,'ar'=>$request->arabic_body];
        $page->update($request->except([
            'english_title',
            'arabic_title',
            'english_body',
            'arabic_body',
        ]));


        return redirect()->route('admin.pages.index')
                        ->with('success','Page has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Page::findOrFail($request->id)->delete();
        return redirect()->route('admin.pages.index')->with('success','Page has been removed successfully');
    }
}
