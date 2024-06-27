@extends('pages.menu.menu')

@section('menu-content')
    <div class="sides-container">
        @foreach($sides as $key => $value)
            <h2 class="side-category">{{$key}}</h2>
            <div class="side-list">
                @foreach($value as $index => $side)
                    <x-product-card
                        :category="'side'"
                        :item="$side"
                    />
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
