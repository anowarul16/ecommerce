<?php

namespace App\Http\Controllers\Admin\Product;
use App\Http\Controllers\Controller;

use App\product;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB:: table('products')->get();
        return view ('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers=DB::table('suppliers') ->orderBy('created_at','desc')->get();
        $brands=DB::table('brands')  ->orderBy('created_at','desc') ->get();
        $subcategorys=DB::table('subcategories') ->orderBy('created_at','desc') ->get(); 
        return view('admin.product.create',compact('suppliers','brands','subcategorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $supplier_id = $request->supplier_id;
        $title = $request->title;
        $subtitle = $request->subtitle;
        $description = $request->description;
        $price = $request->price;
        $brand_id = $request->brand_id;
        $subcategory = $request->subcategory_id;



        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = "P".mt_rand(1000000, 9999999).".".$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/products');
            $image->move($destinationPath, $name);
            
            DB::table('products')->insert([
                'supplier_id' => $supplier_id,
                'title' => $title,
                'subtitle' => $subtitle,
                'description' => $description,
                'price' => $price,
                'brand_id' => $brand_id,
                'subcategory_id' => $subcategory,
                'image' => $name,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
    
            return redirect('product-list');
        }else{
            
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suppliers = DB::table('suppliers')->orderBy('created_at','desc')->get();
        $brands = DB::table('brands')->orderBy('created_at','desc')->get();
        $subcategorys = DB::table('subcategories')->orderBy('created_at','desc')->get();


        $products = DB:: table('products')->where('id',$id)->first();
        return view('admin.product.edite-from',compact('suppliers','brands','subcategorys','products'));
    }

    
    public function update(Request $request)
    {
        $id=$request->id;
        $supplier_id = $request->supplier_id;
        $title = $request->title;
        $subtitle = $request->subtitle;
        $description = $request->description;
        $price = $request->price;
        $brand_id = $request->brand_id;
        $subcategory = $request->subcategory_id;



        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = "P".mt_rand(1000000, 9999999).".".$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/products');
            $image->move($destinationPath, $name);
            
            DB::table('products')
            ->where('id', $id)
            ->update([
                'supplier_id' => $supplier_id,
                'title' => $title,
                'subtitle' => $subtitle,
                'description' => $description,
                'price' => $price,
                'brand_id' => $brand_id,
                'subcategory_id' => $subcategory,
                'image' => $name,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
    
            
        }else{
            
        }
        return redirect('product-list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB:: table('products')->where('id',$id)->delete();
        return redirect()->back();
    }
}
