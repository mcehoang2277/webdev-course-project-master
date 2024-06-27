@extends('pages.menu.menu')

@section('menu-content')
    <div class="desserts-container">
        @foreach($desserts as $key => $value)
            <x-product-card
                :category="'dessert'"
                :item="$value"
            />
        @endforeach
    </div>
@endsection
