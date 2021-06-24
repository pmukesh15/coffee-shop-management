<?php

namespace App\Http\Controllers\Admin;

use App\Wallet;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;

class WalletController extends Controller
{
    public function index()
    {
        $contacts = Wallet::all();
        return view('admin.contact.index',compact('contacts'));
    }
    public function show($id)
    {
        $contact = Wallet::find($id);
        return view('admin.contact.show',compact('contact'));
    }

    public function destroy($id)
    {
        Wallet::find($id)->delete();
        Toastr::success('Wallet Message successfully deleted','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
