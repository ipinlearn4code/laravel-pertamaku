@extends('layouts.master')

@section('title', $post['title'] . ' - My Simple Blog')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Back to Blog -->
    <div class="mb-6">
        <a href="{{ route('blog.index') }}" class="text-blue-600 hover:text-blue-800 transition-colors">
            ← Kembali ke Blog
        </a>
    </div>

    <!-- Article -->
    <article class="bg-white rounded-lg shadow-sm overflow-hidden">
        <!-- Article Header -->
        <div class="p-8 border-b border-gray-200">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $post['title'] }}</h1>
            
            <div class="flex items-center text-sm text-gray-600 space-x-4">
                <span>📅 {{ date('d M Y', strtotime($post['created_at'])) }}</span>
                <span>👤 Admin</span>
                <span>⏱️ 3 min read</span>
            </div>
        </div>

        <!-- Article Content -->
        <div class="p-8">
            <!-- Summary -->
            <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-6">
                <p class="text-blue-800 font-medium">{{ $post['summary'] }}</p>
            </div>

            <!-- Main Content -->
            <div class="prose prose-lg max-w-none">
                <p class="text-gray-700 leading-relaxed text-lg">
                    {{ $post['content'] }}
                </p>

                @if($post['id'] == 1) {{-- Conditional content untuk artikel Laravel --}}
                    <h3 class="text-2xl font-bold text-gray-800 mt-8 mb-4">Fitur Utama Laravel</h3>
                    
                    @php
                        $features = [
                            'Eloquent ORM - Object Relational Mapping yang elegant',
                            'Blade Templating - Template engine yang powerful',
                            'Artisan CLI - Command line interface untuk development',
                            'Route Model Binding - Automatic injection',
                            'Middleware - HTTP middleware layer'
                        ];
                    @endphp

                    <ul class="space-y-2 mb-6">
                        @foreach($features as $feature)
                            <li class="flex items-start">
                                <span class="text-green-500 mr-2">✓</span>
                                <span class="text-gray-700">{{ $feature }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif

                <div class="bg-gray-50 rounded-lg p-6 mt-8">
                    <h4 class="font-semibold text-gray-800 mb-2">💡 Kesimpulan</h4>
                    <p class="text-gray-700">
                        @if($post['id'] == 1)
                            Laravel memberikan fondasi yang kuat untuk pengembangan aplikasi web modern dengan sintaks yang elegant dan dokumentasi yang lengkap.
                        @elseif($post['id'] == 2)
                            Dengan mengikuti tips-tips ini, perjalanan belajar PHP Anda akan menjadi lebih terarah dan efektif.
                        @else
                            Artikel ini memberikan insight berharga yang dapat diterapkan dalam project development Anda.
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <!-- Article Footer -->
        <div class="px-8 py-6 bg-gray-50 border-t border-gray-200">
            <div class="flex flex-wrap gap-2 mb-4">
                @php
                    $tags = match($post['id']) {
                        1 => ['Laravel', 'PHP', 'Framework', 'Web Development'],
                        2 => ['PHP', 'Programming', 'Tips', 'Beginner'],
                        3 => ['Database', 'Design', 'Best Practices', 'SQL'],
                        4 => ['Frontend', 'Backend', 'Web Development', 'Career'],
                        default => ['Web Security', 'Security', 'Best Practices', 'Programming']
                    };
                @endphp

                @foreach($tags as $tag)
                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">{{ $tag }}</span>
                @endforeach
            </div>

            <div class="flex justify-between items-center">
                <div class="text-sm text-gray-600">
                    Artikel ini bermanfaat? Bagikan kepada teman-teman Anda!
                </div>
                <div class="flex space-x-3">
                    <button class="text-blue-600 hover:text-blue-800 transition-colors">
                        👍 Like
                    </button>
                    <button class="text-green-600 hover:text-green-800 transition-colors">
                        🔗 Share
                    </button>
                </div>
            </div>
        </div>
    </article>

    <!-- Related Articles -->
    <div class="mt-8 bg-white rounded-lg shadow-sm p-8">
        <h3 class="text-2xl font-bold text-gray-800 mb-6">Artikel Terkait</h3>
        
        @php
            $relatedPosts = [
                ['id' => 2, 'title' => 'Tips dan Trik PHP untuk Pemula', 'date' => '10 Jan 2024'],
                ['id' => 3, 'title' => 'Database Design Best Practices', 'date' => '5 Jan 2024']
            ];
        @endphp

        <div class="grid md:grid-cols-2 gap-6">
            @foreach($relatedPosts as $relatedPost)
                @if($relatedPost['id'] != $post['id'])
                    <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                        <h4 class="font-semibold text-gray-800 mb-2">{{ $relatedPost['title'] }}</h4>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-500">{{ $relatedPost['date'] }}</span>
                            <a href="{{ route('blog.show', $relatedPost['id']) }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                Baca →
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
