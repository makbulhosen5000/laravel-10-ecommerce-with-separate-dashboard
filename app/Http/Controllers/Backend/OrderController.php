<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use Notification;
use Session;
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
        $order = Order::find($id);
        return view('admin.pages.email.email_info',compact('order'));
    }
    public function sendUserEmail(Request $request,$id){
    $order = Order::find($id);
    $details = [
        'greeting'=> $request->greeting,
        'firstline'=> $request->firstline,
        'body'=> $request->body,
        'button'=> $request->button,
        'url'=> $request->url,
        'lastline,'=> $request->lastline,
    ];
    Notification::send($order, new SendEmailNotification($details));
    Session::flash('success','Email Send successfully');
    return redirect()->back();
    }

     public function productSearch(Request $request){
        $searchText = $request->search;
        $orders = Order::where('name','LIKE',"%$searchText%")->orWhere('phone','LIKE', "%$searchText%")->orWhere('product_title','LIKE',"%$searchText%")->get();
        return view('admin.pages.order.view-order',compact('orders'));
    }

    
}
