<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\Slider;
use App\Wallet;
use Auth;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders    = Slider::all();
        $categories = Category::all();
        $items      = Item::all();
        $walletBal  = 150;
        $wallet     = Wallet::where('customer_id',Auth::user()->id)->first();
        if($wallet){
            $walletBal = $wallet->balance;
        }
        else{
            $objWallet              = New Wallet();
            $objWallet->customer_id = Auth::user()->id;
            $objWallet->balance     = $walletBal;
            $objWallet->save();
        }
        if($categories){
            foreach($categories as $key=>$cat){
                $categories[$key]->item = Item::where('category_id',$cat->id)->get();
            }
        }
        $orders = DB::table('orders')
                    ->join('items', 'items.id', '=', 'orders.item_id')
                    ->select('items.name as item_name','orders.*')
                    ->get();
        return view('welcome',compact('sliders','categories','items','walletBal','orders'));
    }
    public function getItems(Request $request){
        $items = Item::where('category_id',$request->category)->get();
        return $items;
    }
}
