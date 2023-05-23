<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdminPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminPageRequest;

class PageController extends Controller
{
/**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Page::paginate(5);
        return view('admin.admin-pages.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admin-pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminPageRequest $request)
    {
        $request['title']=['en'=>$request->english_title,'ar'=>$request->arabic_title];
        $request['body']=['en'=>$request->english_body,'ar'=>$request->arabic_body];
        AdminPage::create($request->except([
            'english_title',
            'arabic_title',
            'english_body',
            'arabic_body',
        ]));


        return redirect()->route('admin.admin-pages.index')
                        ->with('success','Page has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $page = AdminPage::findOrFail($id);
        return view('admin.admin-pages.show',compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $page = AdminPage::findOrFail($id);
        return view('admin.admin-pages.edit',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminPageRequest $request, string $id)
    {
        $page = AdminPage::findOrFail($id);
        $request['title']=['en'=>$request->english_title,'ar'=>$request->arabic_title];
        $request['body']=['en'=>$request->english_body,'ar'=>$request->arabic_body];
        $page->update($request->except([
            'english_title',
            'arabic_title',
            'english_body',
            'arabic_body',
        ]));


        return redirect()->route('admin.admin-pages.index')
                        ->with('success','Page has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        AdminPage::findOrFail($request->id)->delete();
        return redirect()->route('admin.admin-pages.index')->with('success','Page has been removed successfully');
    }
}
