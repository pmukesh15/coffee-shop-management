<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use DB;
use Auth;
use App\Wallet;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function order(Request $request){
        $this->validate($request,[
            'item'     => 'required',
            'quantity' => 'required',
            'total'    => 'required'
        ]);
        $order              = new Order();
        $customer           = User::where('id',Auth::user()->id)->first();
        $order->customer_id = Auth::user()->id;
        $order->item_id     = intVal($request->item);
        $order->name        = $customer->name;
        $order->email       = $customer->email;
        $order->type        = $request->type;
        if($request->type=="wallet"){
            $wallet = Wallet::where('customer_id',Auth::user()->id)->first();
            if(floatVal($wallet->balance)<floatVal($request->total)){
                Toastr::error('Not enough money in your wallet, please select alternate option','Error',["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
            else{
                $walletBal = floatVal($wallet->balance)-floatVal($request->total);
                $wallet->balance = $walletBal;
                $wallet->save();
            }
        }
        $order->quantity    = $request->quantity;
        $order->total       = $request->total;
        $order->status      = false;
        $order->save();
        Toastr::success('Order request sent successfully.','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
