<div>
    <h2 class="fs-1 fw-bold cart-left-header">Items</h2>
    <div class="d-flex flex-column gap-lg-4 cart-list">
        @foreach($data as $item)
            <x-cart-item :item="$item"/>
        @endforeach
    </div>
</div>
