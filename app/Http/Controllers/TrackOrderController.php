<?php

namespace App\Http\Controllers;

use App\Models\Order;

class TrackOrderController extends Controller
{
    public function index()
    {
        return view('pages.track-order.track-order');
    }

    public function show(string $id)
    {
        $order = Order::query()->where('order_code', $id)->first();

        $view = view('pages.track-order.track-order-result', ['order' => $order]);

        return response([
            'html' => $view->render(),
        ]);
    }
}
