<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\category;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class CategoryController extends Controller
{
   
    public function index()
    {
        $categories = DB:: table('categories')->get();
        return view('admin.category.index',compact('categories'));
    }

    
    public function create()
    {
        return view('admin.category.create');
    }

   
    public function store(Request $request)
    {
        $name = $request->name;

        DB::table('categories')->insert([
            'name' => $name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        return redirect('category-list');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = DB:: table('categories')->where('id',$id)->first();
        return view('admin.category.edite-form',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $name = $request->name;

        DB::table('categories')
        ->where('id',$id)
        ->update([
            'name' => $name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        return redirect('category-list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         DB:: table('categories')->where('id',$id)->delete();
         return redirect()->back();
    }
}
