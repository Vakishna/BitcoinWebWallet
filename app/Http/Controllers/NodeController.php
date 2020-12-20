<?php

namespace App\Http\Controllers;
use Denpa\Bitcoin\Facades\Bitcoind;
use Illuminate\Http\Request;

class NodeController extends Controller
{
    


    
    public function blockTest() {
      $block = bitcoind()
        ->wallet('webwallet')
        ->getwalletinfo();
      return response()->json($block->get());
    }


    public function crwal() {
        $block = bitcoind()->createwallet('waks');
        return response()->json($block->get());
    }



    public function crwaladd() {
        $block = bitcoind()
        ->wallet('waks')
        ->getnewaddress("", );
        return response()->json($block->get());
    }
    





}
