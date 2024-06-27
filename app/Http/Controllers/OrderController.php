<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('pages.admin.order.order', ['orders' => $orders]);
    }

    public function show(string $id)
    {
        $order = Order::findOrFail($id);

        if (! $order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        return view('pages.admin.order.order-detail', ['order' => $order]);
    }

    public function store(StoreOrderRequest $request)
    {
        $data = $request->validated();
        $data['status'] = 'pending';

        if ($request->payment_method === 'cash') {
            $data['payment_status'] = 'not paid';
        } else {
            $data['payment_status'] = 'paid';
        }

        $data['order_code'] = AutoCodeController::generateOrderCode();

        $order = Order::query()->create($data);

        if ($order) {
            return view('pages.checkout.thank-you.thank-you');
        } else {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

    public function edit(string $id)
    {
        $order = Order::findOrFail($id);

        if (! $order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        return view('pages.admin.order.order-edit', ['order' => $order]);
    }

    public function update(UpdateOrderRequest $request, string $id)
    {
        $order = Order::findOrFail($id);

        if (! $order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $data = $request->validated();

        $order->update($data);

        return redirect()->route('admin.order.index');
    }

    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);

        if (! $order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $order->delete();

        return redirect()->route('admin.order.index');
    }
}
