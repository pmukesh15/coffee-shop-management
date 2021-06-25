<?php

namespace App\Http\Controllers;
use Auth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Traits\CommonTrait;

class OrderController extends Controller
{
    use CommonTrait;
    public function order(Request $request){
        $this->validate($request,[
            'item'     => 'required',
            'quantity' => 'required',
            'total'    => 'required'
        ]);
        $id       = Auth::user()->id;
        $param    = ['item'     => $request->item,
                     'quantity' => $request->quantity,
                     'total'    => $request->total,
                     'type'     => $request->type,
                     'id'       => $id
                    ];
        $route    = '/api/create_order';
        $result   = $this->ApiCall($route,$param,"array");
        if(isset($result['status']) && isset($result['message'])){
            if($result['status']=="Success"){
                Toastr::success($result['message'],$result['status'],["positionClass" => "toast-top-right"]);
            }  
            else{
                Toastr::error($result['message'],$result['status'],["positionClass" => "toast-top-right"]);
            }
            return redirect()->back();
        }
    }
}
