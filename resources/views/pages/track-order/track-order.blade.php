@extends('layouts.app')

@section('content')
    <div class="tracking-container">
        <h1 class="text-center">Order Tracking</h1>
        <form method="POST" id="tracking-form">
            @csrf
            <div class="form-group">
                <label for="order_code"></label>
                <input
                    type="text"
                    class="form-control @error('order_code') is-invalid @enderror"
                    id="order_code"
                    name="order_code"
                    placeholder="Enter your order code"
                    required
                >
                @error('order_code')
                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <div id="tracking-order"></div>
    </div>
@endsection
