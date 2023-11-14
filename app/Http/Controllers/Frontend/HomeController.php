<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data['products'] = Product::all();
        return view('frontend.home',$data);
    }
      public function product(){
        
        return view('frontend.pages.product');
    }
       public function productDetails($slug){
         $data['products'] = Product::all();
        return view('frontend.pages.product-details',$data);
    }
}
