@extends('pages.checkout.checkout')

@section('checkout-content')
    <div class="thank-you-container text-center">
        <img width="30%" src="{{url('/assets/delivery.png')}}" alt="delivery-img">
        <p class="fw-semibold fs-1">Your order is on the way, please wait...</p>
        <p class="fw-semibold fs-1">Thank you for choosing us!</p>
        <div class="d-flex justify-content-center mb-xl-5">
            <a href="{{ route('pizza.pizzas') }}" class="btn btn-success fs-1 fw-semibold text-white me-4">Back to
                Menu</a>
            <a href="#" class="btn btn-primary fs-1 fw-semibold">Order History</a>
        </div>
    </div>
@endsection
