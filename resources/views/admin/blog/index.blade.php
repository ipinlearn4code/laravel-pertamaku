@extends('layouts.app')

@section('title', 'Admin - Blog Management')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Blog Management</h2>
            <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Create New Post
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Status</th>
                                <th>Published Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($posts as $post)
                            <tr>
                                <td>
                                    <div>
                                        <h6 class="mb-1">{{ $post->title }}</h6>
                                        <small class="text-muted">{{ Str::limit($post->summary, 50) }}</small>
                                    </div>
                                </td>
                                <td>{{ $post->author->name }}</td>
                                <td>
                                    @if($post->is_published)
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-warning">Draft</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $post->published_at ? $post->published_at->format('d M Y') : '-' }}
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('blog.show', $post->slug) }}" 
                                           class="btn btn-sm btn-outline-primary" target="_blank">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.blog.edit', $post) }}" 
                                           class="btn btn-sm btn-outline-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form method="POST" action="{{ route('admin.blog.destroy', $post) }}" 
                                              class="d-inline" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">
                                    <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                                    <p class="text-muted">No blog posts found.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($posts->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $posts->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection