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
                @include('components.card', ['post' => $post])
            @endforeach
        @else
            <div class="bg-white rounded-lg shadow-sm p-8 text-center">
                <p class="text-gray-500 text-lg">Belum ada artikel yang tersedia.</p>
            </div>
        @endif
    </div>

    <!-- Pagination -->
    @if($totalPages > 1)
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex justify-between items-center">
                <div class="text-sm text-gray-700">
                    Halaman {{ $currentPage }} dari {{ $totalPages }}
                </div>
                
                <div class="flex space-x-2">
                    @if($currentPage > 1)
                        <a href="{{ route('blog.index', ['page' => $currentPage - 1]) }}" 
                           class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition-colors">
                            ← Sebelumnya
                        </a>
                    @endif

                    @for($i = 1; $i <= $totalPages; $i++)
                        @if($i == $currentPage)
                            <span class="bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold">
                                {{ $i }}
                            </span>
                        @elseif($i == 1 || $i == $totalPages || ($i >= $currentPage - 1 && $i <= $currentPage + 1))
                            <a href="{{ route('blog.index', ['page' => $i]) }}" 
                               class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition-colors">
                                {{ $i }}
                            </a>
                        @elseif($i == $currentPage - 2 || $i == $currentPage + 2)
                            <span class="text-gray-500 px-2">...</span>
                        @endif
                    @endfor

                    @if($currentPage < $totalPages)
                        <a href="{{ route('blog.index', ['page' => $currentPage + 1]) }}" 
                           class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition-colors">
                            Selanjutnya →
                        </a>
                    @endif
                </div>
            </div>
        </div>
    @endif

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
