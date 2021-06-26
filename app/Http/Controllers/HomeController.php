<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Traits\CommonTrait;

class HomeController extends Controller
{
    use CommonTrait;
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
        $id       = Auth::user()->id;
        $param    = ['id' => $id];
        $route    = '/api/load_home';
        $result   = $this->ApiCall($route,$param,"object");
        $walletBal= 0;
        if(isset($result)){
            $sliders    = $result->sliders;
            $categories = $result->categories;
            $items      = $result->items;
            $walletBal  = $result->walletBal;
            $orders     = $result->orders;
            return view('welcome',compact('sliders','categories','items','walletBal','orders'));
        }
    }
    public function getItems(Request $request){
        $id       = $request->category;
        $param    = ['id' => $id];
        $route    = '/api/get_items';
        $items    = $this->ApiCall($route,$param,"object");
        if(isset($items)){
            return $items;
        }
    }
}
