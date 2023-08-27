<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    // returns the view cart
    public function cart(){
        return view('cart');
    }
}
