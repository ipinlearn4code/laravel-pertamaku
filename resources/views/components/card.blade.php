{{-- Card component untuk menampilkan post --}}
<div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
    <div class="p-6">
        {{-- Post Header --}}
        <div class="flex justify-between items-start mb-3">
            <h3 class="text-xl font-bold text-gray-800 line-clamp-2">
                <a href="{{ route('blog.show', $post['id']) }}" class="hover:text-blue-600 transition-colors">
                    {{ $post['title'] }}
                </a>
            </h3>
            <span class="text-sm text-gray-500 ml-4 whitespace-nowrap">
                {{ date('d M Y', strtotime($post['created_at'])) }}
            </span>
        </div>

        {{-- Post Summary --}}
        <p class="text-gray-600 mb-4 line-clamp-3">
            {{ $post['summary'] }}
        </p>

        {{-- Post Footer --}}
        <div class="flex justify-between items-center">
            <div class="flex items-center text-sm text-gray-500 space-x-4">
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    3 min read
                </span>
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    {{ rand(50, 200) }} views
                </span>
            </div>

            <a href="{{ route('blog.show', $post['id']) }}" 
               class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium text-sm transition-colors">
                Read More
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </div>

    {{-- Category Badge (optional) --}}
    @if(isset($post['category']))
        <div class="px-6 pb-4">
            <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                {{ $post['category'] }}
            </span>
        </div>
    @endif
</div>
