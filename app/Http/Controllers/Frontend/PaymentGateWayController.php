<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Auth;
use Session;
use Stripe;
class PaymentGateWayController extends Controller
{
        //cash on delivery function
    public function cashOnDelivery(){
       $user = Auth::user();
        $userId = $user->id;
        $cart = Cart::where('user_id','=',$userId)->get();
        foreach($cart as $cart){
            $order = new order;
            $order->name = $cart->name;
            $order->phone = $cart->phone;
            $order->email = $cart->email;
            $order->address = $cart->address;
            $order->user_id = $cart->user_id;
            $order->product_title = $cart->product_title;
            $order->price = $cart->product_price;
            $order->quantity = $cart->quantity;
            $order->image = $cart->image;
            $order->product_id = $cart->product_id;
            $order->payment_status = 'Cash On Delivery';
            $order->delivery_status = 'processing';
            $order->save();
            $cart_id =  $cart->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
        }
        Session::flash('success','Order Received Successfully');
        return redirect()->back();
    }
    public function stripePayment($subTotal){
        return view('frontend.pages.stripe-payment',compact('subTotal'));
    }

    public function stripePaymentStore(Request $request,$subTotal)

   {
    
    
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => $subTotal * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Thanks for payment"
        ]);
        $user = Auth::user();
        $userId = $user->id;
        $cart = Cart::where('user_id', '=', $userId)->get();
        foreach ($cart as $cart) {
            $order = new order();
            $order->name = $cart->name;
            $order->phone = $cart->phone;
            $order->email = $cart->email;
            $order->address = $cart->address;
            $order->user_id = $cart->user_id;
            $order->product_title = $cart->product_title;
            $order->price = $cart->product_price;
            $order->quantity = $cart->quantity;
            $order->image = $cart->image;
            $order->product_id = $cart->product_id;
            $order->payment_status = 'PAID';
            $order->delivery_status = 'processing';
            $order->save();
            $cart_id =  $cart->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
        }

        Session::flash('success', 'Payment successfully Done!');
        return back();
    
   }
}