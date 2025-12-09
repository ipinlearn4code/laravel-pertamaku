@extends('layouts.app')

@section('title', 'Create New Blog Post')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-secondary me-3">
                <i class="fas fa-arrow-left me-2"></i>Back to Blog Management
            </a>
            <h2 class="fw-bold mb-0">Create New Blog Post</h2>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('admin.blog.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label">Title *</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                       id="title" name="title" value="{{ old('title') }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Featured Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                       id="image" name="image" accept="image/*">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Upload an image for the blog post. Will be automatically compressed.</div>
                            </div>

                            <div class="mb-3">
                                <label for="summary" class="form-label">Summary *</label>
                                <textarea class="form-control @error('summary') is-invalid @enderror" 
                                          id="summary" name="summary" rows="3" required>{{ old('summary') }}</textarea>
                                @error('summary')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Brief description of the blog post (max 500 characters)</div>
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Content *</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" 
                                          id="content" name="content" rows="15" required>{{ old('content') }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_published">
                                        Publish immediately
                                    </label>
                                </div>
                                <div class="form-text">If unchecked, the post will be saved as draft</div>
                            </div>

                            <div class="d-flex gap-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Create Post
                                </button>
                                <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">Tips for Writing</h6>
                        <ul class="list-unstyled small text-muted">
                            <li class="mb-2"><i class="fas fa-lightbulb text-warning me-2"></i>Keep the title clear and engaging</li>
                            <li class="mb-2"><i class="fas fa-lightbulb text-warning me-2"></i>Write a compelling summary</li>
                            <li class="mb-2"><i class="fas fa-lightbulb text-warning me-2"></i>Use paragraphs for better readability</li>
                            <li class="mb-2"><i class="fas fa-lightbulb text-warning me-2"></i>Save as draft first to review</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection