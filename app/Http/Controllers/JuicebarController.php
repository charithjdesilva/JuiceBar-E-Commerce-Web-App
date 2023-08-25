<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JuicebarController extends Controller
{
    //
    function index(){
        $products = DB::table('products')->get();
        return view('index', ['products'=>$products]);
    }

    function product(){
        $products = DB::table('products')->get();
        return view('products', ['products'=>$products]);
    }

    public function single_product(Request $request, $id){
        $product_array = DB::table('products')->where('id', $id)->get();
        return view('single_product', ['product_array'=>$product_array]);
    }
}
