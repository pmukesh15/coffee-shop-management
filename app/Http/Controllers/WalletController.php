<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Auth;
use App\Traits\CommonTrait;

class WalletController extends Controller
{
    use CommonTrait;
    public function recharge(Request $request)
    {
        $this->validate($request,[
            'recharge_amount' => 'required',
        ]);
        $id       = Auth::user()->id;
        $param    = ['id'              => $id,
                     'recharge_amount' => $request->recharge_amount
                    ];
        $route    = '/api/recharge_wallet';
        $result   = $this->ApiCall($route,$param,"array");
        if(isset($result['status']) && isset($result['message'])){            
            Toastr::success($result['message'],$result['status'],["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }        
    }
    public function withdraw(Request $request)
    {
        $this->validate($request,[
            'withdraw_amount' => 'required',
        ]);
        $id       = Auth::user()->id;
        $param    = ['id'              => $id,
                     'withdraw_amount' => $request->withdraw_amount
                    ];
        $route    = '/api/withdraw_wallet';
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
