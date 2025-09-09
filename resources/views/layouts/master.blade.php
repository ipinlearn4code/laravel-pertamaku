<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Simple Blog')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">
                        <a href="{{ route('home') }}" class="hover:text-blue-600 transition-colors">Blog Alfred</a>
                    </h1>
                    <p class="text-sm text-gray-600">Berbagi pengetahuan dan pengalaman</p>
                </div>
                
                <!-- Navigation -->
                <nav class="hidden md:flex space-x-6">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 transition-colors {{ request()->routeIs('home') ? 'text-blue-600 font-semibold' : '' }}">
                        Home
                    </a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-blue-600 transition-colors {{ request()->routeIs('about') ? 'text-blue-600 font-semibold' : '' }}">
                        About
                    </a>
                    <a href="{{ route('blog.index') }}" class="text-gray-700 hover:text-blue-600 transition-colors {{ request()->routeIs('blog.*') ? 'text-blue-600 font-semibold' : '' }}">
                        Blog
                    </a>
                    <a href="{{ route('contact.index') }}" class="text-gray-700 hover:text-blue-600 transition-colors {{ request()->routeIs('contact.*') ? 'text-blue-600 font-semibold' : '' }}">
                        Contact
                    </a>
                </nav>

                <!-- Mobile Menu Button -->
                <button class="md:hidden text-gray-700" id="mobile-menu-btn">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Mobile Navigation -->
            <nav class="md:hidden mt-4 space-y-2 hidden" id="mobile-menu">
                <a href="{{ route('home') }}" class="block text-gray-700 hover:text-blue-600 transition-colors {{ request()->routeIs('home') ? 'text-blue-600 font-semibold' : '' }}">
                    Home
                </a>
                <a href="{{ route('about') }}" class="block text-gray-700 hover:text-blue-600 transition-colors {{ request()->routeIs('about') ? 'text-blue-600 font-semibold' : '' }}">
                    About
                </a>
                <a href="{{ route('blog.index') }}" class="block text-gray-700 hover:text-blue-600 transition-colors {{ request()->routeIs('blog.*') ? 'text-blue-600 font-semibold' : '' }}">
                    Blog
                </a>
                <a href="{{ route('contact.index') }}" class="block text-gray-700 hover:text-blue-600 transition-colors {{ request()->routeIs('contact.*') ? 'text-blue-600 font-semibold' : '' }}">
                    Contact
                </a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 mt-auto">
        <div class="container mx-auto px-4 text-center">
            <p class="text-sm">&copy; {{ date('Y') }} My Simple Blog. Dibuat dengan ❤️ menggunakan Laravel.</p>
            <p class="text-xs text-gray-400 mt-1">Semua hak dilindungi undang-undang</p>
        </div>
    </footer>

    <!-- Mobile menu toggle script -->
    <script>
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
