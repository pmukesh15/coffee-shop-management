<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Wallet;
use App\Item;
use App\Order;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $categoryCount = Category::count();
        $itemCount = Item::count();
        $sliderCount = Slider::count();
        $orders = Order::where('status',false)->get();
        $walletCount = Wallet::count();
        return view('admin.dashboard',compact('categoryCount','itemCount','sliderCount','orders','walletCount'));
    }
}
