@php
    $tags = ['All', 'Seafood', 'Beef', 'Chicken', 'Pork', 'Vegetarian'];
    $currentTag = request()->query('tag', '');
    $request = '';
    if (request()->is('menu/pizzas')) {
        $request = 'pizza.pizzas';
    } elseif (request()->is('menu/sides')) {
        $request = 'pizza.sides';
    } else {
        $request = 'pizza.pizzas';
    }
@endphp

<div class="sub-nav-container">
    <ul class="sub-nav-list">
        <li><a class="{{ request()->is('menu/combos') ? 'active' : '' }}" href="{{ route('pizza.combos') }}">Combo</a>
        </li>
        <li><a class="{{ request()->is('menu/pizzas') ? 'active' : '' }}" href="{{ route('pizza.pizzas') }}">Pizza</a>
        </li>
        <li><a class="{{ request()->is('menu/sides') ? 'active' : '' }}" href="{{ route('pizza.sides') }}">Side</a>
        </li>
        <li><a class="{{ request()->is('menu/desserts') ? 'active' : '' }}"
               href="{{ route('pizza.desserts') }}">Dessert</a>
        </li>
        <li><a class="{{ request()->is('menu/drinks') ? 'active' : '' }}" href="{{ route('pizza.drinks') }}">Drink</a>
        </li>
    </ul>
    <div class="sub-nav-option {{ request()->is('menu/pizzas', 'menu/sides', 'menu') ? '' : 'none' }}">
        <ul>
            @foreach ($tags as $tag)
                <li>
                    <a class="{{ $currentTag === 'All' || (empty($currentTag) && $tag === 'All') || $currentTag === $tag ? 'active' : '' }}"
                       href="{{ route($request, ['tag' => $tag === 'All' ? null : $tag]) }}">{{ $tag }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
