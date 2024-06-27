<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->cookie('cartItems');

        //        dd($data);

        if ($data === null || ! count(json_decode($data))) {
            return redirect()->route('pizza.pizzas');
        }

        return view('pages.checkout.cart.cart', ['data' => json_decode($data)]);
    }

    public function showPayment(Request $request)
    {
        $data = $request->cookie('cartItems');

        if (! count(json_decode($data))) {
            return redirect()->route('pizza.pizzas');
        }

        return view('pages.checkout.payment.payment', ['data' => json_decode($data)]);
    }

    public function showThankYou()
    {
        return view('pages.checkout.thank-you.thank-you');
    }
}
