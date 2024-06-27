<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TrackOrderController;
use App\Http\Controllers\User\UserController;
use App\Models\Order;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home.home');
})->name('pizza.home');

Route::get('/home', function () {
    return view('pages.home.home');
})->name('pizza.home')->middleware(['auth', 'verified']);

Route::prefix('orders')->group(function () {
    Route::post('/', [OrderController::class, 'store'])->name('order.store');
});

Route::prefix('/track-order')->group(function () {
    Route::get('/', [TrackOrderController::class, 'index'])->name('pizza.track-order');
    Route::get('/{id}', [TrackOrderController::class, 'show'])->name('pizza.track-order.detail');
});

Route::prefix('/menu')->group(function () {
    Route::get('/pizzas', [MenuController::class, 'pizzasView'])->name('pizza.pizzas');
    Route::get('/sides', [MenuController::class, 'sidesView'])->name('pizza.sides');
    Route::get('/drinks', [MenuController::class, 'drinksView'])->name('pizza.drinks');
    Route::get('/desserts', [MenuController::class, 'dessertsView'])->name('pizza.desserts');
    Route::get('/combos', function () {
        return view('pages.menu.combo');
    })->name('pizza.combos');
    Route::get('/{id}', [MenuController::class, 'productDetailView'])->name('pizza.detail');
});

Route::prefix('/cart')->group(function () {
    Route::get('/', [CheckoutController::class, 'index'])->name('cart.index');
    Route::get('/payment', [CheckoutController::class, 'showPayment'])->name('cart.payment');
    Route::get('/thank-you', [CheckoutController::class, 'showThankYou'])->name('cart.thank-you');
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', function () {
        $orders_paid = Order::where('payment_status', 'paid')->get();

        $total_revenue = 0;
        foreach ($orders_paid as $order) {
            $total_revenue += $order->total_price;
        }

        // order status pending
        $orders_pending = Order::where('status', 'pending')->get();

        return view('pages.admin.dashboard', ['total_revenue' => $total_revenue, 'orders_pending' => count($orders_pending)]);
    })->name('admin.dashboard');

    //    Product Controller
    Route::prefix('products')->group(function () {
        Route::get('', [ProductController::class, 'index'])->name('admin.product');
        Route::post('', [ProductController::class, 'store'])->name('admin.product.store');
        Route::get('/create', [ProductController::class, 'create'])->name('admin.product.create');
        Route::get('/{id}', [ProductController::class, 'show'])->name('admin.product.detail');
        Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::patch('/{id}', [ProductController::class, 'update'])->name('admin.product.update');
        Route::delete('/{id}', [ProductController::class, 'destroy'])->name('admin.product.delete');
    });

    //    User Controller
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.user');
        Route::get('/{id}', [UserController::class, 'show'])->name('admin.user.detail');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::patch('/{id}', [UserController::class, 'update'])->name('admin.user.update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('admin.user.delete');
    });

    //    Order Controller
    Route::prefix('orders')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('admin.order');
        Route::get('/{id}', [OrderController::class, 'show'])->name('admin.order.detail');
        Route::get('/{id}/edit', [OrderController::class, 'edit'])->name('admin.order.edit');
        Route::patch('/{id}', [OrderController::class, 'update'])->name('admin.order.update');
        Route::delete('/{id}', [OrderController::class, 'destroy'])->name('admin.order.delete');
    });
});
