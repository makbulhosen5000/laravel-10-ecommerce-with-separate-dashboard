<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

       //search product
      public function searchProduct(Request $request){
        $data['carts'] = Cart::all();
        $search_text = $request->search;
        $data['products'] = Product::where('name','LIKE',"%$search_text%")->orWhere('price','LIKE',"%$search_text%")->paginate(6);
        return view('frontend.home',$data); 
    }

}
