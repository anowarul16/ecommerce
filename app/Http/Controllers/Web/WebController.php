<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class WebController extends Controller
{
    public function index(){
        $categories = DB::table('categories')->get();
        return view('web.index',compact('categories'));
    }
}
