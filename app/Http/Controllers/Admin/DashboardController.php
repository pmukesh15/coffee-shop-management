<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Wallet;
use App\Item;
use App\Order;
use App\Slider;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $categoryCount = Category::count();
        $itemCount     = Item::count();
        $customerCount = User::count();
        $orderCount    = Order::count();
        $orders        = DB::table('orders')
                                ->join('items', 'items.id', '=', 'orders.item_id')
                                ->where('orders.status','!=',false)
                                ->select('items.name as item_name','orders.*')
                                ->get();
        $notConfirmed  = Order::where('status',false)->count();
        return view('admin.dashboard',compact('categoryCount','itemCount','customerCount','orders','notConfirmed','orderCount'));
    }
}
