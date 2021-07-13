<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resolvers\PaymentPlatformResolver;

class PaymentController extends Controller
{

	protected $paymentPlatformResolver;
	public function __construct(PaymentPlatformResolver $paymentPlatformResolver)
    {
       $this->middleware('auth');
       $this->paymentPlatformResolver = $paymentPlatformResolver;
    }

    public function pay(Request $request){
    	$request->validate([
    		'payment_platform' => ['required']
    	]);
    	
    	$paymentPlatform = $this->paymentPlatformResolver
            ->resolveService($request->payment_platform);

        session()->put('paymentPlatformId', $request->payment_platform);

        return $paymentPlatform->handlePayment($request);
    }

    public function approval(){
        if (session()->has('paymentPlatformId')){
            $paymentPlatform = $this->paymentPlatformResolver
            ->resolveService(session()->get('paymentPlatformId'));

            return $paymentPlatform->handleApproval();
        }

        return redirect()
            ->route('web.checkout')
            ->withErrors('We cannot capture your payment. Try again, please');
    }

    public function cancelled(){
        return redirect()
            ->route('cart.checkout')
            ->withErrors('You Cancelled the payment');
    }
}
