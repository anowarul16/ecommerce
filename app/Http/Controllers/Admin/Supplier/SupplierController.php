<?php

namespace App\Http\Controllers\Admin\Supplier;
use App\Http\Controllers\Controller;

use App\supplier;
use Illuminate\Http\Request;

use DB;
use Carbon\Carbon;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = DB:: table('suppliers')->get();
        return view('admin.supplier.index',compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supplier.create');
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
        $email = $request->email;
        $contuct_no = $request->contuct_no;
        $address = $request->address;
        
        DB::table('suppliers')->insert([
            'name' =>$name,
            'email' =>$email,
            'contuct_no' =>$contuct_no,
            'address' =>$address,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect('supplier-list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suppliers = DB:: table('suppliers')->where('id',$id)->first();
        return view('admin.supplier.edite-from',compact('suppliers'));
    }
 
    public function update(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $email = $request->email;
        $contuct_no = $request->contuct_no;
        $address = $request->address;
        
        DB::table('suppliers')
        ->where('id',$id)
        ->update([
            'name' =>$name,
            'email' =>$email,
            'contuct_no' =>$contuct_no,
            'address' =>$address,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect('supplier-list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB:: table('suppliers')->where('id',$id)->delete();
        return redirect()->back();
    }
}
