<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Wallet;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use DB;

class CustomerController extends Controller
{
        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $objUser            = New User();
        $objUser->name      = $request->name;
        $objUser->email     = $request->email;
        $objUser->password  = Hash::make($request->password);
        $objUser->save();

        $objWallet              = New Wallet();
        $objWallet->customer_id = $objUser->id;
        $objWallet->balance     = $request->wallet;
        $objWallet->save();

        return redirect()->route('customer.index')->with('successMsg','Customer Successfully Created');
    }
        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer  = User::find($id);
        $walletBal = Wallet::where('customer_id',$id)->first()->balance;
        return view('admin.customer.edit',compact('customer','walletBal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validationArr['name'] = 'required|string|max:255';
        if(isset($request->password)){
            $validationArr['password'] = 'string|min:6';
        }
        $this->validate($request,$validationArr);

        $objUser            = User::find($id);
        $objUser->name      = $request->name;
        if(isset($request->password)){
            $objUser->password  = Hash::make($request->password);
        }
        $objUser->save();

        $objWallet              = Wallet::where('customer_id',$id)->first();
        $objWallet->customer_id = $objUser->id;
        $objWallet->balance     = $request->wallet;
        $objWallet->save();
        return redirect()->route('customer.index')->with('successMsg','Customer Successfully Updated');
    }
    public function index()
    {
        $customers = DB::table('users')
                        ->join('wallets', 'wallets.customer_id', '=', 'users.id')
                        ->where('users.name','!=',"Admin")
                        ->select('wallets.balance as wallet_balance','users.*')
                        ->get();
        return view('admin.customer.index',compact('customers'));
    }
    public function show($id)
    {
        $customer = User::find($id);
        return view('admin.customer.show',compact('customer'));
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        Toastr::success('Customer successfully deleted','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
