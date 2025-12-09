@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold">Admin Dashboard</h2>
                <p class="text-muted mb-0">Welcome back, {{ auth()->user()->name }}!</p>
            </div>
            <div class="dropdown">
                <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <i class="fas fa-user me-2"></i>{{ auth()->user()->name }}
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row g-4 mb-5">
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <div>
                                <h3 class="fw-bold mb-0">{{ \App\Models\BlogPost::count() }}</h3>
                                <small class="text-muted">Total Posts</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                <i class="fas fa-eye"></i>
                            </div>
                            <div>
                                <h3 class="fw-bold mb-0">{{ \App\Models\BlogPost::published()->count() }}</h3>
                                <small class="text-muted">Published</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="bg-warning text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                <i class="fas fa-edit"></i>
                            </div>
                            <div>
                                <h3 class="fw-bold mb-0">{{ \App\Models\BlogPost::where('is_published', false)->count() }}</h3>
                                <small class="text-muted">Drafts</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                <i class="fas fa-users"></i>
                            </div>
                            <div>
                                <h3 class="fw-bold mb-0">{{ \App\Models\User::count() }}</h3>
                                <small class="text-muted">Users</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="row g-4 mb-5">
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Quick Actions</h5>
                        <div class="d-grid gap-2">
                            <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>Create New Blog Post
                            </a>
                            <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-primary">
                                <i class="fas fa-list me-2"></i>Manage Blog Posts
                            </a>
                            <a href="{{ route('blog.index') }}" class="btn btn-outline-info" target="_blank">
                                <i class="fas fa-globe me-2"></i>View Public Blog
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Recent Posts</h5>
                        @php $recentPosts = \App\Models\BlogPost::latest()->take(3)->get(); @endphp
                        @forelse($recentPosts as $post)
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-light rounded p-2 me-3">
                                <i class="fas fa-file-alt text-muted"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1">{{ Str::limit($post->title, 40) }}</h6>
                                <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                            </div>
                            @if($post->is_published)
                                <span class="badge bg-success">Published</span>
                            @else
                                <span class="badge bg-warning">Draft</span>
                            @endif
                        </div>
                        @empty
                        <p class="text-muted">No blog posts yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Links -->
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h5 class="fw-bold mb-3">Site Navigation</h5>
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="text-muted">Public Pages</h6>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('home') }}" class="text-decoration-none">Home</a></li>
                            <li><a href="{{ route('about') }}" class="text-decoration-none">About</a></li>
                            <li><a href="{{ route('services') }}" class="text-decoration-none">Services</a></li>
                            <li><a href="{{ route('contact') }}" class="text-decoration-none">Contact</a></li>
                            <li><a href="{{ route('blog.index') }}" class="text-decoration-none">Blog</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted">Admin Actions</h6>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('admin.blog.index') }}" class="text-decoration-none">Manage Blog</a></li>
                            <li><a href="{{ route('profile.edit') }}" class="text-decoration-none">Edit Profile</a></li>
                            <li><a href="{{ route('dashboard') }}" class="text-decoration-none">User Dashboard</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection