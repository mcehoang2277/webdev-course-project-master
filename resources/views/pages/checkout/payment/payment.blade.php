@extends('pages.checkout.checkout')

@section('checkout-content')
    <div class="row cart-container">
        <div class="col-12 col-md-12 col-xl-6 payment-left">
            @include('pages.checkout.payment.payment-left')
            @include('pages.checkout.cart.cart-left', ['data' => $data])
            @include('pages.checkout.payment.payment-left-note')
        </div>
        <div class="col-12 col-md-12 col-xl-6 payment-right">
            @include('pages.checkout.payment.payment-right')
            @include('pages.checkout.cart.cart-right', ['data' => $data, 'route' => 'cart.thank-you'])
        </div>
    </div>
@endsection
