@extends('layouts.app')

@section('title', 'Edit Blog Post')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-secondary me-3">
                <i class="fas fa-arrow-left me-2"></i>Back to Blog Management
            </a>
            <h2 class="fw-bold mb-0">Edit Blog Post</h2>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('admin.blog.update', $blog) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="title" class="form-label">Title *</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                       id="title" name="title" value="{{ old('title', $blog->title) }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Featured Image</label>
                                @if($blog->image)
                                    <div class="mb-2">
                                        <img src="data:image/jpeg;base64,{{ base64_encode($blog->image) }}" 
                                             alt="Current image" class="img-thumbnail" style="max-height: 200px;">
                                        <div class="form-text">Current image (upload new image to replace)</div>
                                    </div>
                                @endif
                                <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                       id="image" name="image" accept="image/*">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Upload a new image to replace the current one. Will be automatically compressed.</div>
                            </div>

                            <div class="mb-3">
                                <label for="summary" class="form-label">Summary *</label>
                                <textarea class="form-control @error('summary') is-invalid @enderror" 
                                          id="summary" name="summary" rows="3" required>{{ old('summary', $blog->summary) }}</textarea>
                                @error('summary')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Brief description of the blog post (max 500 characters)</div>
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Content *</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" 
                                          id="content" name="content" rows="15" required>{{ old('content', $blog->content) }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1" 
                                           {{ old('is_published', $blog->is_published) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_published">
                                        Published
                                    </label>
                                </div>
                                <div class="form-text">
                                    @if($blog->published_at)
                                        Originally published on {{ $blog->published_at->format('d F Y, H:i') }}
                                    @else
                                        This post has not been published yet
                                    @endif
                                </div>
                            </div>

                            <div class="d-flex gap-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Update Post
                                </button>
                                <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">Cancel</a>
                                <a href="{{ route('blog.show', $blog->slug) }}" class="btn btn-outline-info" target="_blank">
                                    <i class="fas fa-eye me-2"></i>Preview
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">Post Information</h6>
                        <div class="small text-muted">
                            <p class="mb-2"><strong>Slug:</strong> {{ $blog->slug }}</p>
                            <p class="mb-2"><strong>Author:</strong> {{ $blog->author->name }}</p>
                            <p class="mb-2"><strong>Created:</strong> {{ $blog->created_at->format('d M Y, H:i') }}</p>
                            <p class="mb-0"><strong>Last Updated:</strong> {{ $blog->updated_at->format('d M Y, H:i') }}</p>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">Tips for Editing</h6>
                        <ul class="list-unstyled small text-muted">
                            <li class="mb-2"><i class="fas fa-lightbulb text-warning me-2"></i>Check for typos and grammar</li>
                            <li class="mb-2"><i class="fas fa-lightbulb text-warning me-2"></i>Update summary if content changed significantly</li>
                            <li class="mb-2"><i class="fas fa-lightbulb text-warning me-2"></i>Preview before publishing</li>
                            <li class="mb-2"><i class="fas fa-lightbulb text-warning me-2"></i>Consider SEO keywords in title</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection