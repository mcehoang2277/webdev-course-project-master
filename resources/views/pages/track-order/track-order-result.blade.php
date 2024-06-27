@isset($order)
    <div class="alert alert-success resutl__success">
        <div id="tracking-result">
            <h4 class="alert-heading fs-1 fw-semibold">Hello, {{$order->customer['name']}}</h4>
            <p class="fs-3">Thank you for your order!</p>
            <hr>
            <p class="fs-3">Your order is <strong>{{$order->status}}</strong></p>
            <p class="fs-3">Order code: <strong>{{$order->order_code}}</strong></p>
            <p class="fs-3">Order created date: <strong>{{$order->created_at}}</strong></p>
            <p class="fs-3">Order payment status: <strong>{{$order->payment_status}}</strong></p>
        </div>
    </div>
@else
    <div class="alert alert-danger resutl__error">
        <div id="tracking-result">
            <h4 class="alert-heading fs-1 fw-semibold">Sorry, we can't find your order!</h4>
            <p class="fs-3">Please check your order code again!</p>
        </div>
    </div>
@endisset
