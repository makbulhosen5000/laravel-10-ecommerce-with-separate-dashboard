<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use PDF;
class OrderController extends Controller
{
    public function index(){
        $data['orders'] = Order::all();
        return view('admin.pages.order.view-order',$data);
    }

    public function deliverOrder($id){
        $order = Order::find($id);
        $order->delivery_status="delivered";
        $order->payment_status="PAID";
        $order->save();
        return redirect()->back();
    }
    // order print function
    public function orderPrintPdf($id){
     $order = Order::find($id);
     $pdf = PDF::loadView('admin.pages.order.order-print-pdf',compact('order'));
     return $pdf->download('order_details.pdf');
    }
    //email notification function
    public function sendEmail($id){
        
    }
}
