@extends('layouts.master')

@section('title', 'Contact - My Simple Blog')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Page Header -->
    <div class="bg-white rounded-lg shadow-sm p-8 mb-8">
        <h2 class="text-4xl font-bold text-gray-800 mb-4">Hubungi Kami</h2>
        <p class="text-lg text-gray-600">
            Punya pertanyaan, saran, atau ingin berkolaborasi? Kami sangat senang mendengar dari Anda!
        </p>
    </div>

    <div class="grid lg:grid-cols-2 gap-8">
        <!-- Contact Form -->
        <div class="bg-white rounded-lg shadow-sm p-8">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">Kirim Pesan</h3>

            <!-- Success Alert -->
            @if(session('success'))
                @include('components.alert', ['type' => 'success', 'message' => session('success')])
            @endif

            <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Lengkap <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           value="{{ old('name') }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('name') border-red-500 @enderror"
                           placeholder="Masukkan nama lengkap Anda">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           value="{{ old('email') }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('email') border-red-500 @enderror"
                           placeholder="nama@email.com">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Subject Field -->
                <div>
                    <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">
                        Subject <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           id="subject" 
                           name="subject" 
                           value="{{ old('subject') }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('subject') border-red-500 @enderror"
                           placeholder="Topik pesan Anda">
                    @error('subject')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Message Field -->
                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                        Pesan <span class="text-red-500">*</span>
                    </label>
                    <textarea id="message" 
                              name="message" 
                              rows="5"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('message') border-red-500 @enderror"
                              placeholder="Tuliskan pesan Anda di sini...">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700 transition-colors font-semibold">
                    Kirim Pesan
                </button>
            </form>
        </div>

        <!-- Contact Info -->
        <div class="space-y-6">
            <!-- Contact Details -->
            <div class="bg-white rounded-lg shadow-sm p-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Informasi Kontak</h3>
                
                <div class="space-y-4">
                    <div class="flex items-center">
                        <div class="bg-blue-100 p-3 rounded-lg mr-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Email</h4>
                            <p class="text-gray-600">info@mysimpleblog.com</p>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="bg-green-100 p-3 rounded-lg mr-4">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Telepon</h4>
                            <p class="text-gray-600">+62 123 4567 890</p>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="bg-purple-100 p-3 rounded-lg mr-4">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Alamat</h4>
                            <p class="text-gray-600">Jakarta, Indonesia</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Response Time Info -->
            <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg p-8">
                <h3 class="text-xl font-bold mb-4">⏰ Waktu Respon</h3>
                <p class="mb-4">
                    Kami berusaha merespon setiap pesan dalam waktu 24 jam pada hari kerja.
                </p>
                
                @php
                    $responseTime = [
                        'Email' => '< 24 jam',
                        'Telepon' => '09:00 - 17:00 WIB',
                        'Chat' => 'Segera'
                    ];
                @endphp

                <div class="space-y-2">
                    @foreach($responseTime as $method => $time)
                        <div class="flex justify-between items-center">
                            <span class="opacity-90">{{ $method }}:</span>
                            <span class="font-semibold">{{ $time }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- FAQ -->
            <div class="bg-white rounded-lg shadow-sm p-8">
                <h3 class="text-xl font-bold text-gray-800 mb-4">❓ FAQ</h3>
                <div class="space-y-3 text-sm">
                    <div>
                        <p class="font-semibold text-gray-800">Bisakah request topik artikel?</p>
                        <p class="text-gray-600">Ya, kami selalu terbuka untuk saran topik artikel baru.</p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">Apakah ada konsultasi gratis?</p>
                        <p class="text-gray-600">Untuk pertanyaan ringan, kami dengan senang hati membantu gratis.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
