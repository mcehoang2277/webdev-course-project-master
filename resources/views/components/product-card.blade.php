@props(['category', 'item'])

<div class="{{ $category }}-item">
    <div class="{{ $category }}-img">
        <img data-bs-toggle="modal" data-bs-target="#staticBackdrop"
            @if (isset($item->_id)) data-bs-details="{{ json_encode(['category' => $category, 'item' => $item]) }}" @endif
            @if (isset($item->imgURL)) src="{{ url($item->imgURL) }}" alt="{{ $item->name }}" @endif>
    </div>
    <div class="{{ $category }}-detail">
        <a data-bs-toggle="modal" data-bs-target="#staticBackdrop"
            @if (isset($item->_id)) data-bs-details="{{ json_encode(['category' => $category, 'item' => $item]) }}" @endif
            class="{{ $category }}-name">
            {{ $item->name }}
        </a>
        <p class="{{ $category }}-option">
            @if (isset($item->size) || $category == 'pizza')
                <span class="size">{{ $item->size ? $item->size : 'Medium' }}</span> - <br>
            @endif
            <span class="price">{{ number_format($item->price, 0, ',', ',') }} VNĐ</span>
        </p>
    </div>
</div>
