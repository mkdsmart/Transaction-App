<?php

namespace App\Http\Controllers;

use App\Models\Recipient;
use App\Models\Transaction;
use App\Models\User;
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

        $recipients= Recipient::all()->where('user_id', Auth::user()->id);


        return redirect()->route('dashboard')->with(['recipients'=> $recipients]);
    }
    public function storereceiverinfo(Request $request){
        $validatedData = $request->validate([
            'recipient'=> ['required'],
            'reason' => ['required'],
            'city'=> ['required'],
            'address'=>['required'],
            'phone'=>['required'],
        ]);

        $recipient= Recipient::create([
            'name'=> $validatedData['recipient'],
            'country' => Session::get('country'),
            'city' => $validatedData['city'],
            'address' => $validatedData['address'],
            'phone' => $validatedData['phone'],
            'reason' => $validatedData['reason'],
            'user_id' => Auth::user()->id,

           ]);
           $recipient->save();

        Session::put('recipient', $validatedData['recipient']);
        Session::put('reason', $validatedData['reason']);
        Session::put('city', $validatedData['city']);
        Session::put('address', $validatedData['address']);
        Session::put('phone', $validatedData['phone']);

        return redirect(route('confirmation'));


    }

    public function autofill(){

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

    public function history(){
        $transactions = Transaction::all()->where('user_id', Auth::user()->id);
        //  dd($transactions != null);

        return view('/transactionhistory', ['transactions'=> $transactions]);

    }

    public function payment($id){

        $transaction = Transaction::find($id);
        if($transaction->amount > Auth::user()->bank_account){
            dd('not enough money');
        }
        Auth::user()->bank_account = Auth::user()->bank_account - $transaction->amount;
        Auth::user()->save();
        $transaction->status = "paid";
        $transaction->save();

        return redirect()->route('transactionhistory');

    }
    public function deleteview($id){

        $transaction = Transaction::find($id);
        $transaction->delete = 1;
        $transaction->save();

        return redirect()->route('transactionhistory');

    }
}
