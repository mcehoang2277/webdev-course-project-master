<?php
$todayHighlight = [
    [
        'imgURL' => '/assets/Pizza_Extra_Topping.jpg',
        'name' => 'PIZZA SIÊU TOPPING HẢI SẢN XỐT MAYONNAISE - SUPER TOPPING OCEAN MANIA',
        'size' => 'Medium',
        'price' => 235000,
    ],
    [
        'imgURL' => '/assets/Pizza_Extra_Topping.jpg',
        'name' => 'PIZZA SIÊU TOPPING HẢI SẢN XỐT MAYONNAISE - SUPER TOPPING OCEAN MANIA',
        'size' => 'Medium',
        'price' => 235000,
    ],
    [
        'imgURL' => '/assets/Pizza_Extra_Topping.jpg',
        'name' => 'PIZZA SIÊU TOPPING HẢI SẢN XỐT MAYONNAISE - SUPER TOPPING OCEAN MANIA',
        'size' => 'Medium',
        'price' => 235000,
    ],
    [
        'imgURL' => '/assets/Pizza_Extra_Topping.jpg',
        'name' => 'PIZZA SIÊU TOPPING HẢI SẢN XỐT MAYONNAISE - SUPER TOPPING OCEAN MANIA',
        'size' => 'Medium',
        'price' => 235000,
    ],
];

$todayHighlight = array_map('json_decode', array_map('json_encode', $todayHighlight));
?>

<div class="products-container">
    <h1>Today Highlight !</h1>
    <div class="red-line"></div>
    <div class="products-list">
        @foreach ($todayHighlight as $key => $value)
            <x-product-card :category="'todayHighlight'" :item="$value" />
        @endforeach
    </div>
    <a href="{{ route('pizza.pizzas') }}" class="btn btn-outline-primary see-more">See more</a>
</div>
