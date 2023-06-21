<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Braintree\Gateway;
use Illuminate\Http\Request;

class BraintreeController extends Controller
{
    public function token($plan)
    {
        $gateway = new Gateway([
            'environment' => 'sandbox', // use 'production' for production environment
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY'),
        ]);

        $token = $gateway->clientToken()->generate();


        $plan = Plan::where('id', $plan)->first();

        // pass the generated token to your view
        return view('admin.payments.index', compact('token', 'plan'));
    }

    public function checkout(Request $request)
    {
        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);

        $nonce = $request->payment_method_nonce;

        $amount = json_decode($request->amount);

        $price = floatval($amount->price);


        $result = $gateway->transaction()->sale([
            'amount' => $price,  
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            return redirect()->back()->with('success', 'Transaction successful with plan'.$amount->name);
        } else {
            return redirect()->back()->withErrors(['error' => 'Transaction failed']);
        }
    }
}
