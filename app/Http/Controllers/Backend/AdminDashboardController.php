<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
class AdminDashboardController extends Controller
{
    public function index(){
    $data['totalProduct'] = Product::all()->count();
    $data['totalOrder'] = Order::all()->count();
    $data['totalUser'] = User::all()->count();
    $orders = Order::all();
    $total_revenue = 0;
    foreach($orders as $order){
         $total_revenue = $total_revenue + $order->price;
    }
    $data['totalDelivered'] = Order::where('delivery_status','delivered')->get()->count();
    $data['totalProcessing'] = Order::where('delivery_status','processing')->get()->count();
    $data['totalPaidPayment'] = Order::where('payment_status','PAID')->get()->count();
    $data['totalCashPayment'] = Order::where('payment_status','Cash On Delivery')->get()->count();
    return view('admin.dashboard',$data,compact('total_revenue'));
    }
}
