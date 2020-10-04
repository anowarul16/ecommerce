<?php

namespace App\Http\Controllers\Admin\subcategory;

use App\Http\Controllers\Controller;
use App\subcategory;
use Illuminate\Http\Request;

use DB;
use Carbon\Carbon;

class SubcategoryController extends Controller
{
   
    public function index()
    {
        $subcategories = DB:: table('subcategories')
        ->join('categories','subcategories.category_id','=','categories.id')
        ->select('subcategories.*','categories.name as cname')
        ->get();
        return view('admin.subcategory.index',compact('subcategories'));
    }

    public function create()
    {
        
        $categorys = DB::table('categories')->orderBy('created_at','desc')->get();
        return view('admin.subcategory.create',compact('categorys'));
    }

    
    public function store(Request $request)
    {
        $category_id = $request->category_id;
        $name = $request->name;

        DB::table('subcategories')->insert([
            'category_id' => $category_id,
            'name' => $name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect('subcategory-list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorys = DB::table('categories')->orderBy('created_at','desc')->get();
        $subcategories = DB:: table('subcategories')->where('id',$id)->first();
        return view('admin.subcategory.edite-from',compact('subcategories','categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id=$request->id;
        $category_id = $request->category_id;
        $name = $request->name;

        DB::table('subcategories')
        ->where('id',$id)
        ->update([
            'category_id' => $category_id,
            'name' => $name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect('subcategory-list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB:: table('subcategories')->where('id',$id)->delete();
         return redirect()->back();
    }
}
