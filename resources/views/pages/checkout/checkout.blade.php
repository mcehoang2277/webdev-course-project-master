@extends('layouts.app')

@section('content')
    @include('pages.checkout.progress')
    <div class="container">
        @yield('checkout-content')
    </div>
@endsection
