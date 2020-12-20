<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Wallet;
use Illuminate\Support\Facades\DB;
use Denpa\Bitcoin\Facades\Bitcoind;
use Validator;



class WalletController extends Controller
{
    
    public function index()
    {      
        $user = Auth::user();
        $id = Auth::id();

        $wallets = DB::table('wallets')
            -> select()
            -> where('user_id', $id)
            ->get();

        
        foreach ($wallets as $wallet) {
            $balance = bitcoind()
            ->wallet($wallet->id)
            ->getBalance();
        }
       
        return view('wallet.show', ['wallet' => $wallets, 'balance' => $balance]);
    }


    
    function sendFunds(Request $request) {
        
        $address = $request->address;
        $amount = $request->amount;

        $id = Auth::id();

        $wallets = DB::table('wallets')
        -> select()
        -> where('user_id', $id)
        ->get();



        foreach ($wallets as $wallet) {
        $block = bitcoind()
        ->wallet(strval($wallet->id))
        ->sendtoaddress($address, $amount);

        return response()->json($block->get());
        }

    }




   








}
