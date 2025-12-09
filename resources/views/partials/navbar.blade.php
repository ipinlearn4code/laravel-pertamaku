<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <!-- Brand -->
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('logo.png') }}" alt="AlpiNet Logo" style="height: 30px;" class="me-2">AlpiNet
        </a>

        <!-- Mobile menu button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                        <i class="fas fa-home me-1"></i>Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ url('/about') }}">
                        <i class="fas fa-info-circle me-1"></i>About
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('services') ? 'active' : '' }}" href="{{ url('/services') }}">
                        <i class="fas fa-wifi me-1"></i>Paket Internet
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('blog*') ? 'active' : '' }}" href="{{ route('blog.index') }}">
                        <i class="fas fa-newspaper me-1"></i>Blog
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">
                        <i class="fas fa-envelope me-1"></i>Contact
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>