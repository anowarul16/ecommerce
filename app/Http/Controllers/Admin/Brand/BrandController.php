<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Http\Controllers\Controller;
use App\brand;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = DB:: table('brands')
        ->join('subcategories','brands.sub_category_id','=','subcategories.id')
         ->join('categories','subcategories.category_id','=','categories.id')
         ->select('brands.*','subcategories.name as sname','categories.name as cname')
        ->get();
         
        return view('admin.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = DB::table('subcategories')->orderBy('created_at','desc')->get();
        $categorys = DB::table('categories')->orderBy('created_at','desc')->get();
        return view('admin.brand.create',compact('categorys','subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;

        DB::table('brands')->insert([
            'sub_category_id' => $request->subCategory_id,
            'name' => $name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        return redirect('brand-list');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $brands = DB:: table('brands')->where('id',$id)->first();
        return view('admin.brand.edite-form',compact('brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
       
        $name = $request->name;

        DB::table('brands')
        ->where('id',$id)
        ->update([
            'name' => $name,
            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        return redirect('brand-list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB:: table('brands')->where('id',$id)->delete();
        return redirect()->back();
    }
}
