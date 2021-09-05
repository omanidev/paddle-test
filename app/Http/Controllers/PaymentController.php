<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function paylink(Request $request) {

        $payLink = Auth::user()->charge(12.99, "Test Charge") ;
        
        return view('billing', [
            'payLink' => $payLink,
            'webhook_url' => 'http://paddle.test/webhook',
        ]);
        
    }

    public function product(Request $request) {

        $payLink = Auth::user()->chargeProduct($productId = 15743) ;
        
        return view('product', [
            'payLink' => $payLink,
            'webhook_url' => 'http://paddle.test/webhook',
        ]);
        
    }


}
