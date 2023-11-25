<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
       if(Auth::id()){
           $user = Auth::user();
           $product = Product::find($id);
           $cart = new Cart;
           $cart->name = $user->name;
           $cart->email = $user->email;
           $cart->email = $user->email;
           $cart->phone = $user->phone;
           $cart->address = $user->address;
           $cart->user_id = $user->id;
           $cart->product_title = $product->name;
           if($product->price !=null){
             $cart->product_price = $product->discount * $request->quantity;
           }else{
             $cart->product_price = $product->price * $request->quantity;
           }
           $cart->image = $product->image;
           $cart->product_id = $product->id;
           $cart->quantity = $request->quantity;
           $cart->save();
           Session::flash('success','Product Added Successfully');
           return redirect()->back();
       }else{
        return redirect('login');
       }
    }
    //showing cart item function
    public function showCart(){
      if(Auth::id()){
        $id = Auth::user()->id;
        $data['carts'] = Cart::where('user_id','=',$id)->get();
        $data['products'] = Product::all();
        return view('frontend.pages.show-cart',$data);
      }else{
        return redirect('login');
      }
    
    }

    public function deleteCart($id){
         $cart = Cart::find($id);
         $cart->delete();
         return redirect()->back();
    }
}
