<div class="container">
    <h1>Order summary: </h1>
    <div class="container summary">
        <div class="row">
            <div class="col-7">
                <p>Subtotal:</p>
            </div>
            <div class="col-5 price">
                <p class="fw-semibold">
                    <span class="sub-price">xxx xxx xxx</span>đ
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-7">
                <p>Delivery fee:</p>
            </div>
            <div class="col-5 price">
                <p class="fw-semibold"><span class="delivery-fee">0</span>đ</p>
            </div>
        </div>

        <div class="row">
            <div class="col-7">
                <p>Discounted: </p>
            </div>
            <div class="col-5 price">
                <p class="fw-semibold">0đ</p>
            </div>
        </div>
        <hr>
        <div class="row total">
            <div class="col-7">
                <p>Total: </p>
            </div>
            <div class="col-5 price">
                <p class="fw-semibold">
                    <span class="total-price">xxx xxx xxx</span>đ
                </p>
            </div>
        </div>

    </div>
    <div class="btn-right-container">
        @if(request()->routeIs('cart.payment'))
            <button type="button" class="btn btn-primary btn-proceed" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                Proceed To Payment
            </button>
        @else
            <a href="{{route($route)}}" class="btn-proceed">Proceed to Payment</a>
        @endif
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-2" id="exampleModalLabel">Confirmation</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body fs-2">Select "Confirm" below if you want to make this order.</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary fs-2" data-bs-dismiss="modal">Close</button>
                <form method="POST" action="{{route('order.store')}}" id="order-form">
                    @csrf
                    <button type="submit" class="btn btn-primary fs-2 btn-create-order">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>
