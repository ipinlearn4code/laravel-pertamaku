@extends('layouts.master')

@section('title', 'Blog - My Simple Blog')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Page Header -->
    <div class="bg-white rounded-lg shadow-sm p-8 mb-8">
        <h2 class="text-4xl font-bold text-gray-800 mb-4">Semua Artikel</h2>
        <p class="text-lg text-gray-600">
            Koleksi artikel terbaru tentang programming, web development, dan teknologi.
        </p>
    </div>

    <!-- Blog Posts -->
    <div class="space-y-6 mb-8">
        @if($paginatedPosts->count() > 0)
            @foreach($paginatedPosts as $post)
            @endforeach
        @else
            <div class="bg-white rounded-lg shadow-sm p-8 text-center">
                <p class="text-gray-500 text-lg">Belum ada artikel yang tersedia.</p>
            </div>
        @endif
    </div>

    

    <!-- Blog Stats -->
    <div class="mt-8 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg p-6 text-center">
        <h3 class="text-xl font-bold mb-2">📊 Statistik Blog</h3>
        <div class="flex justify-center space-x-8">
            <div>
                <div class="text-2xl font-bold">5</div>
                <div class="text-sm opacity-90">Total Artikel</div>
            </div>
            <div>
                <div class="text-2xl font-bold">{{ $totalPages }}</div>
                <div class="text-sm opacity-90">Total Halaman</div>
            </div>
        </div>
    </div>
</div>
@endsection
