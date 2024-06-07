<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class transactionController extends Controller
{


    public function storetransactioninfo(Request $request){
        $validatedData = $request->validate([
            'country'=> ['required'],
            'withdraw'=> ['required'],
            'moneysend'=>['required'],
        ]);

        Session::put('country', $validatedData['country']);
        Session::put('withdraw', $validatedData['withdraw']);
        Session::put('moneysend', $validatedData['moneysend']);

        return redirect(route('dashboard'));
    }
    public function storereceiverinfo(Request $request){
        $validatedData = $request->validate([
            'recipient'=> ['required'],
            'reason' => ['required'],
            'city'=> ['required'],
            'address'=>['required'],
            'phone'=>['required'],
        ]);

        Session::put('recipient', $validatedData['recipient']);
        Session::put('reason', $validatedData['reason']);
        Session::put('city', $validatedData['city']);
        Session::put('address', $validatedData['address']);
        Session::put('phone', $validatedData['phone']);

        return redirect(route('confirmation'));


    }

    public function savingdata(){
       $transaction= Transaction::create([
        'sender'=> Auth::user()->first_name .' '. Auth::user()->last_name,
        'recipient'=> Session::get('recipient'),
        'country' => Session::get('country'),
        'city' => Session::get('city'),
        'address' => Session::get('address'),
        'phone' => Session::get('phone'),
        'withdrawal_method' => Session::get('withdraw'),
        'amount' => Session::get('moneysend'),
        'user_id' => Auth::user()->id,

       ]);
       $transaction->save();

       return redirect( route('finish'));

    }
}
