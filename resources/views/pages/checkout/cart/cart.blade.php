@extends('pages.checkout.checkout')

@section('checkout-content')
    <div class="row cart-container">
        <div
            class="col-12 col-md-12 col-xl-6 cart-left">@include('pages.checkout.cart.cart-left', ['data' => $data])</div>
        <div
            class="col-12 col-md-12 col-xl-6 cart-right">@include('pages.checkout.cart.cart-right', ['data' => $data, 'route' => 'cart.payment'])</div>
    </div>
@endsection
