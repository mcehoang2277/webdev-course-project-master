<section class="myheader {{ request()->is('menu*') }}">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo01"
                    aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="/">
                <img src="{{ url('/assets/WizzaLogo.svg') }}" alt="Logo" width="60" height="60"
                     class="d-inline-block"></a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-black" href="#">PROMOTION</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black" href="{{ route('pizza.pizzas') }}">MENU</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black" href="#">STORES</a>
                    </li>
                </ul>
                <ul class="navbar-nav nav-right">
                    <li class="nav-item">
                        <a href="{{route('pizza.track-order')}}">TRACKING</a>
                    </li>
                    @include('pages.auth.auth')
                    <li class="nav-item">
                        <a class="position-relative cart-icon" href="/cart">
                            <svg width="32" height="30" viewBox="0 0 32 30" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M27.3918 16.2017H4.32502C3.31584 16.2017 2.73917 17.0667 2.88334 17.9317L4.90168 26.8701C5.19002 28.1676 6.34336 29.1768 7.78503 29.1768H23.7876C25.2293 29.1768 26.3826 28.1676 26.671 26.8701L28.6893 17.9317C28.9776 17.0667 28.2568 16.2017 27.3918 16.2017ZM14.4167 23.4101C14.4167 24.1309 13.8401 24.8518 12.9751 24.8518C12.1101 24.8518 11.5334 24.1309 11.5334 23.4101V20.5267C11.5334 19.8059 12.1101 19.0851 12.9751 19.0851C13.8401 19.0851 14.4167 19.8059 14.4167 20.5267V23.4101ZM20.1834 23.4101C20.1834 24.1309 19.6068 24.8518 18.7417 24.8518C17.8767 24.8518 17.3001 24.1309 17.3001 23.4101V20.5267C17.3001 19.8059 17.8767 19.0851 18.7417 19.0851C19.6068 19.0851 20.1834 19.8059 20.1834 20.5267V23.4101Z"
                                    fill="black"/>
                                <path
                                    d="M28.8335 8.99337H25.6618L22.9226 2.07334C22.3459 0.631662 20.6159 -0.0891751 19.1743 0.487494C17.7326 1.06416 17.0117 2.79417 17.5884 4.23584L19.4626 8.99337H12.2542L14.1284 4.23584C14.7051 2.79417 13.9842 1.06416 12.5426 0.487494C11.1009 -0.0891751 9.37088 0.631662 8.79421 2.07334L6.05503 8.99337H2.88335C1.29751 8.99337 0 10.2909 0 11.8767V13.3184C0 14.1834 0.576669 14.7601 1.44167 14.7601H30.2751C31.1401 14.7601 31.7168 14.1834 31.7168 13.3184V11.8767C31.7168 10.2909 30.4193 8.99337 28.8335 8.99337Z"
                                    fill="black"/>
                            </svg>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger total-cart">
                                0
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>
