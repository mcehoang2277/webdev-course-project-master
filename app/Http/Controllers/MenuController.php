<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Product;

class MenuController extends Controller
{
    public function pizzasView()
    {
        $filterType = request('tag');

        if ($filterType) {
            $data = Product::query()->where('category', 'pizza')->where('additionalProperties.topping', $filterType)->get();
            $pizzas = Helper::convertToCategory($data, 'additionalProperties.variant');
        } else {
            $pizzas = Helper::convertToCategory(Product::query()->where('category', 'pizza')->get(), 'additionalProperties.variant');
        }

        return view('pages.menu.pizza', ['pizzas' => $pizzas]);
    }

    public function sidesView()
    {
        $filterType = request('tag');

        if ($filterType) {
            $data = Product::query()->where('category', 'side')->where('additionalProperties.topping', $filterType)->get();
            $sides = Helper::convertToCategory($data, 'additionalProperties.variant');
        } else {
            $sides = Helper::convertToCategory(Product::query()->where('category', 'side')->get(), 'additionalProperties.variant');
        }

        return view('pages.menu.side', ['sides' => $sides]);
    }

    public function drinksView()
    {
        $drinks = Product::query()->where('category', 'drink')->get();

        return view('pages.menu.drink', ['drinks' => $drinks]);
    }

    public function dessertsView()
    {
        $desserts = Product::query()->where('category', 'dessert')->get();

        return view('pages.menu.dessert', ['desserts' => $desserts]);
    }

    public function productDetailView(string $id)
    {
        $content = view('pages.menu.product-detail', ['item' => Product::query()->find($id)]);

        return response()->json(['content' => $content->render()]);
    }
}
