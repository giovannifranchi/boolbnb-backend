<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

    // pass the generated token to your view
    return view('admin.payments.index', ['token' => $token, 'plan' => $plan]);
}
}
