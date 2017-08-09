<?php

namespace App\Http\Controllers\Admin;

use App\SubCat;
use App\Category;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('crud')) {
            return abort(401);
        }
        $sub_categories = SubCat::all();
        return view('admin.sub_categories.index', compact('sub_categories'))->with(['controller'=>'SubCatsController']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('crud')) {
            return abort(401);
        }
        $categories = Category::all();
        return view('admin.sub_categories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('crud')) {
            return abort(401);
        }
        SubCat::create($request->all());

        return redirect()->route('admin.sub_categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCat  $subCat
     * @return \Illuminate\Http\Response
     */
    public function show(SubCat $subCat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCat  $subCat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('crud')) {
            return abort(401);
        }
        $sub_categories = SubCat::findOrFail($id);
        $categories = Category::all();
        return view('admin.sub_categories.edit', compact('sub_categories'), compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCat  $subCat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (! Gate::allows('crud')) {
            return abort(401);
        }
        $subCat= SubCat::findOrFail($id);
        $subCat->update($request->all());

        return redirect()->route('admin.sub_categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCat  $subCat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('crud')) {
            return abort(401);
        }
        $sub_categories = SubCat::findOrFail($id);
        $sub_categories->delete();

        return redirect()->route('admin.sub_categories.index');
    }
}
