@php use Illuminate\Support\Facades\Auth; @endphp
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('homeRoute') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/shop">Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/contact">Contact</a>
            </li>
            @if(auth()->user() && !is_null(auth()->user()->role) && auth()->user()->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('product.all') }}">All Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact.all') }}">All Contacts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('product.add') }}">Add Product</a>
                </li>
            @endif
            @if(Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
