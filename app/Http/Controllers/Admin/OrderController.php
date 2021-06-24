<?php

namespace App\Http\Controllers\Admin;

use App\Notifications\OrderConfirmed;
use App\Order;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;
use DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = DB::table('orders')
                    ->join('items', 'items.id', '=', 'orders.item_id')
                    ->select('items.name as item_name','orders.*')
                    ->get();
        return view('admin.order.index',compact('orders'));
    }
    public function status($id){
        $order = Order::find($id);
        $order->status = true;
        $order->save();
        Toastr::success('Order successfully confirmed.','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
    public function destory($id){
        Order::find($id)->delete();
        Toastr::success('Order successfully deleted.','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
