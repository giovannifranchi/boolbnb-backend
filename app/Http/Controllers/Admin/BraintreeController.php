<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Plan;
use Braintree\Gateway;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BraintreeController extends Controller
{
    public function token($plan, Apartment $apartment)
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
        return view('admin.payments.index', compact('token', 'plan', 'apartment'));
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

            $apartment = Apartment::where('id', $request->apartment)->first();

            $now = Carbon::now();
        
            $expiration = $now->addHours($amount->duration);

            $user = $request->user();

            $data = ['name' => $user->name, 'amount'=>$price, 'apartment_id'=> $apartment->name, 'date' => now(), 'expires'=> $expiration];
    
            $apartment->plans()->attach($amount->id, ['expire_date'=>$expiration]);
            
            return view('admin.payments.statuspay', compact('data'))->with('success', true);
        } else {
            return view('admin.payments.statuspay')->with('success', false);
        }
    }
}
