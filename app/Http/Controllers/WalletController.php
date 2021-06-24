<?php

namespace App\Http\Controllers;

use App\Wallet;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Auth;

class WalletController extends Controller
{
    public function recharge(Request $request)
    {
        $this->validate($request,[
            'recharge_amount' => 'required',
        ]);

        $wallet          = Wallet::where('customer_id',Auth::user()->id)->first();
        $wallet->balance = floatVal($wallet->balance)+floatVal($request->recharge_amount);
        $wallet->save();

        Toastr::success('Successfully recharged.','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
    public function withdraw(Request $request)
    {
        $this->validate($request,[
            'withdraw_amount' => 'required',
        ]);

        $wallet          = Wallet::where('customer_id',Auth::user()->id)->first();
        if(floatVal($wallet->balance)<floatVal($request->withdraw_amount)){
            Toastr::error('Not enough money in your wallet.','Error',["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
        $wallet->balance = floatVal($wallet->balance)-floatVal($request->withdraw_amount);
        $wallet->save();

        Toastr::success('Successfully withdrawn.','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
