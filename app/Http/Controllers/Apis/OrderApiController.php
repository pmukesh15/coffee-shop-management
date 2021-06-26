<?php

namespace App\Http\Controllers\Apis;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\User;
use App\Wallet;
use App\Category;
use App\Item;
use App\Slider;
use DB;

class OrderApiController extends Controller
{
    /**
     * save imported data to db
     *
     * @param  array  $request
     * @return json $response
     */
    protected function createOrder(Request $request)
    {
        $order              = new Order();
        $customer           = User::where('id',$request->id)->first();
        $order->customer_id = $request->id;
        $order->item_id     = intVal($request->item);
        $order->name        = $customer->name;
        $order->email       = $customer->email;
        $order->type        = $request->type;
        if($request->type=="wallet"){
            $wallet = Wallet::where('customer_id',$request->id)->first();
            if(floatVal($wallet->balance)<floatVal($request->total)){
                $response['message'] = "Not enough money in your wallet, please select alternate option";
                $response['status']  = "Error";
                return $response;
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

        $response['message'] = "Order request sent successfully.";
        $response['status']  = "Success";
        return $response;
    }
    //Get home page data
    protected function loadHome(Request $request)
    {
        $response['sliders']    = Slider::all();
        $response['categories'] = Category::all();
        foreach($response['categories'] as $key => $cat){
            $response['categories'][$key]->item_count = $cat->items->count();
        }
        $response['items']      = Item::all();
        foreach($response['items'] as $key => $item){
            $response['items'][$key]->category_slug = $item->category->slug;
        }
        $response['walletBal']  = 150;
        $wallet     = Wallet::where('customer_id',$request->id)->first();
        if($wallet){
            $response['walletBal'] = $wallet->balance;
        }
        else{
            $objWallet              = New Wallet();
            $objWallet->customer_id = $request->id;
            $objWallet->balance     = $response['walletBal'];
            $objWallet->save();
        }
        $response['orders'] = DB::table('orders')
                                ->join('items', 'items.id', '=', 'orders.item_id')
                                ->select('items.name as item_name','orders.*')
                                ->get();
        return $response;
    }
    //get items
    protected function getItems(Request $request){
        $items = Item::where('category_id',$request->id)->get();
        return $items;
    }
    //recharge wallet
    protected function rechargeWallet(Request $request){
        $wallet          = Wallet::where('customer_id',$request->id)->first();
        $wallet->balance = floatVal($wallet->balance)+floatVal($request->recharge_amount);
        $wallet->save();
        $response['message'] = "Successfully recharged.";
        $response['status']  = "Success";
        return $response;
    }
    //withdraw wallet
    protected function withdrawWallet(Request $request){
        $wallet = Wallet::where('customer_id',$request->id)->first();
        if(floatVal($wallet->balance)<floatVal($request->withdraw_amount)){
            $response['message'] = "Not enough money in your wallet.";
            $response['status']  = "Error";
            return $response;
        }
        $wallet->balance = floatVal($wallet->balance)-floatVal($request->withdraw_amount);
        $wallet->save();
        $response['message'] = "Successfully withdrawn.";
        $response['status']  = "Success";
        return $response;
    }
    //cancel order
    protected function deleteOrder(Request $request){
        $orderData = Order::find($request->id);
        $message   = "Order cancelled.";
        if($orderData->type=="wallet"){
            $wallet          = Wallet::where('customer_id',$orderData->customer_id)->first();
            $wallet->balance = floatVal($wallet->balance)+floatVal($orderData->total);
            $wallet->save();
            $message   .= ' Amount has been refunded to your wallet.';
        }
        $orderData->delete();
        $response['message'] = $message;
        $response['status']  = "Success";
        return $response;
    }
}
