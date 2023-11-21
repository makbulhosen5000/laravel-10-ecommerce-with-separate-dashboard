<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Cart;

class HomeController extends Controller
{
    public function index(){
     
    $data['products'] = Product::all();
    $data['carts'] = Cart::all();
    return view('frontend.home',$data); 
    }

       public function productDetails($id){
        $data['carts'] = Cart::all();
        $data['products'] = Product::with('gallery')->find($id);
        return view('frontend.pages.product-details',$data);
    }
}
