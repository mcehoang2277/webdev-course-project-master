<div class="dropdown">
    <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M20.5227 21C24.3009 21 27.3636 17.866 27.3636 14C27.3636 10.134 24.3009 7 20.5227 7C16.7446 7 13.6818 10.134 13.6818 14C13.6818 17.866 16.7446 21 20.5227 21Z"
                fill="black" />
            <path
                d="M20.5227 24.5C10.0903 24.5 6.84091 31.5 6.84091 31.5V35H34.2045V31.5C34.2045 31.5 30.9551 24.5 20.5227 24.5Z"
                fill="black" />
        </svg>
    </button>
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        @if (auth()->check())
            <a class="dropdown-item fw-normal" href="#">
                Hello,
                {{ auth()->user()->name }}
            </a>
            <a class="dropdown-item fw-normal" href="#">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Your Profile
            </a>

            @if (auth()->user()->role == 'admin')
                <a class="dropdown-item fw-normal" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Dashboard
                </a>
            @endif

            <div class="dropdown-divider"></div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="dropdown-item fw-normal" type="submit">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </button>
            </form>
        @else
            <a class="dropdown-item fw-normal" href="{{ route('login') }}">
                <i class="fas fa-sign-in-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Login
            </a>
            <a class="dropdown-item fw-normal" href="{{ route('register') }}">
                <i class="fas fa-user-plus fa-sm fa-fw mr-2 text-gray-400"></i>
                Register
            </a>
        @endif
    </div>
</div>
