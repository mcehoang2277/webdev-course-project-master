@extends('pages.menu.menu')

@section('menu-content')
    <div class="pizzas-container">
        @foreach($pizzas as $key => $value)
            <p class="pizza-category">{{$key}}</p>
            <div class="pizza-list">
                @foreach($value as $pizza)
                    <x-product-card
                        :category="'pizza'"
                        :item="$pizza"
                    />
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
