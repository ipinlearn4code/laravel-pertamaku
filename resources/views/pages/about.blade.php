@extends('layouts.master')

@section('title', 'About - My Simple Blog')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- About Header -->
    <div class="bg-white rounded-lg shadow-sm p-8 mb-8">
        <h2 class="text-4xl font-bold text-gray-800 mb-6">Tentang Blog Alfred</h2>
        
        <div class="prose prose-lg max-w-none">
            <p class="text-lg text-gray-700 leading-relaxed mb-6">
                My Simple Blog adalah platform sederhana yang didedikasikan untuk berbagi pengetahuan 
                dan pengalaman dalam dunia programming, khususnya teknologi web development menggunakan PHP dan Laravel.
            </p>

            @if(true) {{-- Conditional untuk menampilkan informasi tambahan --}}
                <div class="bg-green-50 border-l-4 border-green-400 p-6 mb-6">
                    <h3 class="text-lg font-semibold text-green-800 mb-2">🎯 Misi Kami</h3>
                    <p class="text-green-700">
                        Menyediakan konten berkualitas yang mudah dipahami untuk membantu developer pemula 
                        maupun yang sudah berpengalaman dalam mengembangkan kemampuan programming mereka.
                    </p>
                </div>
            @endif

            <h3 class="text-2xl font-bold text-gray-800 mb-4">Mengapa My Simple Blog?</h3>
            
            @php
                $reasons = [
                    [
                        'title' => 'Konten Berkualitas',
                        'description' => 'Artikel ditulis berdasarkan pengalaman nyata dan best practices industry'
                    ],
                    [
                        'title' => 'Mudah Dipahami',
                        'description' => 'Penjelasan sederhana dengan contoh praktis yang langsung bisa diterapkan'
                    ],
                    [
                        'title' => 'Update Berkala',
                        'description' => 'Konten selalu diperbarui mengikuti perkembangan teknologi terbaru'
                    ],
                    [
                        'title' => 'Community Driven',
                        'description' => 'Terbuka untuk diskusi dan berbagi pengalaman dengan sesama developer'
                    ]
                ];
            @endphp

            <div class="grid md:grid-cols-2 gap-6 mb-8">
                @foreach($reasons as $reason)
                    <div class="border border-gray-200 rounded-lg p-6">
                        <h4 class="text-xl font-semibold text-gray-800 mb-3">{{ $reason['title'] }}</h4>
                        <p class="text-gray-600">{{ $reason['description'] }}</p>
                    </div>
                @endforeach
            </div>

            <h3 class="text-2xl font-bold text-gray-800 mb-4">Topik yang Dibahas</h3>
            
            @php
                $topics = [
                    'Laravel Framework',
                    'PHP Programming',
                    'Database Design',
                    'Frontend Development',
                    'Web Security',
                    'Best Practices',
                    'Tips & Tricks',
                    'Project Tutorials'
                ];
            @endphp

            <div class="flex flex-wrap gap-3 mb-8">
                @foreach($topics as $topic)
                    <span class="bg-blue-100 text-blue-800 px-4 py-2 rounded-full text-sm font-medium">
                        {{ $topic }}
                    </span>
                @endforeach
            </div>

            <div class="bg-gray-50 rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-3">💡 Fun Fact</h3>
                <p class="text-gray-700">
                    Blog ini dibuat menggunakan Laravel dan Tailwind CSS, menunjukkan bahwa dengan tools yang tepat, 
                    kita bisa membuat aplikasi yang simple namun powerful dan elegant.
                </p>
            </div>
        </div>
    </div>

    <!-- Contact CTA -->
    <div class="bg-blue-600 text-white rounded-lg p-8 text-center">
        <h3 class="text-2xl font-bold mb-4">Punya Pertanyaan atau Saran?</h3>
        <p class="text-blue-100 mb-6">
            Kami selalu terbuka untuk feedback dan diskusi. Jangan ragu untuk menghubungi kami!
        </p>
        <a href="{{ route('contact.index') }}" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
            Hubungi Kami
        </a>
    </div>
</div>
@endsection
