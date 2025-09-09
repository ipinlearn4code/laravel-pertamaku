@extends('layouts.master')

@section('title', 'Home - My Simple Blog')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Hero Section -->
    <div class="bg-white rounded-lg shadow-sm p-8 mb-8">
        <h2 class="text-4xl font-bold text-gray-800 mb-4">Selamat Datang di My Simple Blog</h2>
        <p class="text-lg text-gray-600 mb-6">
            Tempat berbagi pengetahuan, pengalaman, dan insight tentang dunia programming dan teknologi. 
            Mari belajar bersama dan berkembang dalam dunia digital yang terus berevolusi.
        </p>
        
        @if(true) {{-- Contoh penggunaan conditional --}}
            <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-6">
                <p class="text-blue-700">
                    <strong>Tips Hari Ini:</strong> Konsistensi dalam belajar programming lebih penting daripada intensitas. 
                    Belajar 30 menit setiap hari lebih efektif daripada 5 jam dalam satu hari.
                </p>
            </div>
        @else
            <div class="bg-gray-50 border-l-4 border-gray-400 p-4 mb-6">
                <p class="text-gray-700">Tidak ada tips khusus hari ini.</p>
            </div>
        @endif

        <div class="flex flex-col sm:flex-row gap-4">
            <a href="{{ route('blog.index') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors text-center">
                Lihat Semua Artikel
            </a>
            <a href="{{ route('about') }}" class="bg-gray-200 text-gray-800 px-6 py-3 rounded-lg hover:bg-gray-300 transition-colors text-center">
                Tentang Kami
            </a>
        </div>
    </div>

    <!-- Featured Posts -->
    <div class="bg-white rounded-lg shadow-sm p-8">
        <h3 class="text-2xl font-bold text-gray-800 mb-6">Artikel Terbaru</h3>
        
        <div class="grid md:grid-cols-2 gap-6">
            @php
                $featuredPosts = [
                    [
                        'id' => 1,
                        'title' => 'Memulai Perjalanan dengan Laravel',
                        'summary' => 'Laravel adalah framework PHP yang powerful dan elegant untuk pengembangan web modern.',
                        'date' => '15 Jan 2024'
                    ],
                    [
                        'id' => 2,
                        'title' => 'Tips dan Trik PHP untuk Pemula',
                        'summary' => 'Kumpulan tips berguna untuk memulai programming dengan bahasa PHP.',
                        'date' => '10 Jan 2024'
                    ]
                ];
            @endphp

            @foreach($featuredPosts as $post)
                <div class="border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow">
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">{{ $post['title'] }}</h4>
                    <p class="text-gray-600 mb-3">{{ $post['summary'] }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">{{ $post['date'] }}</span>
                        <a href="{{ route('blog.show', $post['id']) }}" class="text-blue-600 hover:text-blue-800 font-medium">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Stats Section -->
    <div class="grid md:grid-cols-3 gap-6 mt-8">
        <div class="bg-white rounded-lg shadow-sm p-6 text-center">
            <div class="text-3xl font-bold text-blue-600 mb-2">5+</div>
            <div class="text-gray-600">Artikel</div>
        </div>
        <div class="bg-white rounded-lg shadow-sm p-6 text-center">
            <div class="text-3xl font-bold text-green-600 mb-2">100+</div>
            <div class="text-gray-600">Pembaca</div>
        </div>
        <div class="bg-white rounded-lg shadow-sm p-6 text-center">
            <div class="text-3xl font-bold text-purple-600 mb-2">3</div>
            <div class="text-gray-600">Kategori</div>
        </div>
    </div>
</div>
@endsection
