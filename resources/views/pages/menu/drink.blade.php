@extends('pages.menu.menu')

@section('menu-content')
    <div class="drinks-container">
        @foreach($drinks as $key => $value)
            <x-product-card
                :category="'drink'"
                :item="$value"
            />
        @endforeach
    </div>
@endsection
