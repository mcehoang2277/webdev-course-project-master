@props(['item'])

<div class="cart-item-container">
    <div>
        <div class="cart-item-img">
            <img src="{{ $item->imgURL }}" alt="{{ $item->name }}">
        </div>
        <div class="cart-item-info">
            <p>{{ $item->name }}</p>
            <div>
                <button data-id="{{ $item->_id }}" class="decrement-btn">-</button>
                <label>
                    <input class="cart-quantity" type="text" value="{{ $item->quantity }}">
                </label>
                <button data-id="{{ $item->_id }}" class="increment-btn">+</button>
            </div>
            <p>Price: <span>{{ number_format($item->price, 0, ',', ',') }}</span>đ</p>
            @isset($item->size)
                <p>Size: {{ $item->size }}</p>
                <p>Crust: {{ $item->crust }}</p>
                <p>Bonus: {{ $item->cheese }}</p>
            @endisset
            <p class="btn-action fs-3" style="font-weight: 500">Action:
                <span class="btn-delete fs-3" data-id="{{ $item->_id }}" data-url="{{ url()->current() }}">
                    <i class="fa-regular fa-trash">
                    </i>
                </span>
            </p>
        </div>
    </div>
    <div class="cart-item-price">
        <p>Total</p>
        <p><span class="total-item-price">xxx xxx xxx</span>đ</p>
    </div>
</div>
