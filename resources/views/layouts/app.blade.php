<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'AlpiNet - Internet Cepat & Stabil di Bekasi')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
        }
        
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 80px 0;
        }
        
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        
        .footer-bg {
            background-color: #2c3e50;
        }
        
        .navbar-brand {
            font-weight: 600;
            font-size: 1.5rem;
        }
        
        .btn-primary-custom {
            background: linear-gradient(45deg, #667eea, #764ba2);
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            transition: all 0.3s ease;
        }
        
        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        /* Custom Carousel Styles */
        .custom-carousel-container {
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            padding: 0 80px;
        }
        
        .custom-carousel {
            position: relative;
            height: 450px;
            overflow: visible;
        }
        
        .carousel-slide {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%) scale(0.7);
            opacity: 0.3;
            transition: all 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            z-index: 1;
            width: 350px;
        }
        
        .carousel-slide.active {
            transform: translateX(-50%) scale(1);
            opacity: 1;
            z-index: 3;
        }
        
        .carousel-slide.prev {
            transform: translateX(-150%) scale(0.85);
            opacity: 0.7;
            z-index: 2;
        }
        
        .carousel-slide.next {
            transform: translateX(50%) scale(0.85);
            opacity: 0.7;
            z-index: 2;
        }
        
        .carousel-slide .card {
            width: 100%;
            border-radius: 15px;
            overflow: hidden;
        }
        
        .custom-prev-btn,
        .custom-next-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.7);
            border: none;
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            font-size: 18px;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 10;
        }
        
        .custom-prev-btn {
            left: -25px;
        }
        
        .custom-next-btn {
            right: -25px;
        }
        
        .custom-prev-btn:hover,
        .custom-next-btn:hover {
            background: rgba(0, 0, 0, 0.9);
            transform: translateY(-50%) scale(1.1);
        }
        
        .custom-dots {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 30px;
        }
        
        .custom-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            border: none;
            background: #ccc;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .custom-dot.active {
            background: #667eea;
            transform: scale(1.2);
        }
        
        .custom-dot:hover {
            background: #764ba2;
        }
        
        /* Mobile Responsive */
        @media (max-width: 768px) {
            .custom-carousel-container {
                padding: 0 15px;
            }
            
            .carousel-slide {
                padding: 0 10px;
            }
            
            .custom-prev-btn,
            .custom-next-btn {
                width: 40px;
                height: 40px;
                font-size: 14px;
            }
            
            .custom-prev-btn {
                left: -20px;
            }
            
            .custom-next-btn {
                right: -20px;
            }
        }
    </style>

    @stack('styles')
</head>
<body>
    <!-- Navigation -->
    @include('partials.navbar')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('partials.footer')

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    @stack('scripts')
</body>
</html>
