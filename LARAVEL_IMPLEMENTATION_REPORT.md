# Laporan Implementasi Laravel - AlpiNet Company Profile

## Daftar Isi
1. [Overview Proyek](#overview-proyek)
2. [Struktur Database](#struktur-database)
3. [Route Implementation](#route-implementation)
4. [Blade Templating System](#blade-templating-system)
5. [Controller Architecture](#controller-architecture)
6. [Model Implementation](#model-implementation)
7. [Authentication & Authorization](#authentication--authorization)
8. [Admin Dashboard](#admin-dashboard)
9. [Fitur-Fitur Utama](#fitur-fitur-utama)
10. [Screenshots](#screenshots)

---

## Overview Proyek

**Nama Proyek**: AlpiNet Company Profile  
**Framework**: Laravel 11  
**Database**: MySQL  
**Frontend**: Bootstrap 5 + Blade Templates  
**Tema**: Website company profile untuk penyedia layanan internet di Bekasi  

### Teknologi yang Digunakan:
- **Backend**: PHP 8.2+ dengan Laravel 11
- **Database**: MySQL dengan Eloquent ORM
- **Frontend**: Bootstrap 5, Font Awesome, Custom CSS
- **Authentication**: Laravel Breeze
- **Testing**: PHPUnit/Pest

---

## Struktur Database

### 1. Tabel Users (Authentication)

```php
// Migration: 0001_01_01_000000_create_users_table.php
Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email')->unique();
    $table->timestamp('email_verified_at')->nullable();
    $table->string('password');
    $table->rememberToken();
    $table->timestamps();
});
```

**Model**: `app/Models/User.php`
```php
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password', 'remember_token'];
    
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
```

### 2. Tabel Blog Posts

```php
// Migration: 2025_12_09_071736_create_blog_posts_table.php
Schema::create('blog_posts', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->string('slug')->unique();
    $table->text('summary');
    $table->longText('content');
    $table->foreignId('author_id')->default(1)->constrained('users')->onDelete('cascade');
    $table->timestamp('published_at')->nullable();
    $table->boolean('is_published')->default(true);
    $table->timestamps();
    
    $table->index(['is_published', 'published_at']);
    $table->index('slug');
});
```

**Model**: `app/Models/BlogPost.php`
```php
class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'summary', 'content', 'image', 
        'author_id', 'published_at', 'is_published'
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_published' => 'boolean'
    ];

    // Relationship
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // Scopes
    public function scopePublished($query)
    {
        return $query->where('is_published', true)
                    ->whereNotNull('published_at')
                    ->where('published_at', '<=', now());
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('published_at', 'desc');
    }
}
```

### 3. Tabel Internet Packages

```php
// Migration: 2025_12_09_090337_create_internet_packages_table.php
Schema::create('internet_packages', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->integer('speed_mbps');
    $table->decimal('price', 10, 2);
    $table->text('description');
    $table->json('features');
    $table->boolean('is_popular')->default(false);
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});
```

**Model**: `app/Models/InternetPackage.php`
```php
class InternetPackage extends Model
{
    protected $fillable = [
        'name', 'speed_mbps', 'price', 'description', 
        'features', 'is_popular', 'is_active'
    ];

    protected $casts = [
        'features' => 'array',
        'is_popular' => 'boolean',
        'is_active' => 'boolean',
        'price' => 'decimal:2'
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopePopular($query)
    {
        return $query->where('is_popular', true);
    }

    // Accessors
    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }
}
```

### 4. Database Schema Lengkap

**Tabel yang telah diimplementasi**:
- `users` - Manajemen pengguna dan admin
- `blog_posts` - Artikel/berita perusahaan  
- `internet_packages` - Paket layanan internet
- `contact_submissions` - Pesan dari form kontak
- `contact_info` - Informasi kontak perusahaan
- `service_areas` - Area layanan
- `testimonials` - Testimoni pelanggan
- `cache`, `jobs` - Sistem caching dan queue Laravel

**Snapshot Database ERD**:
```
[Gambar ERD Database - Menunjukkan relasi antar tabel]
```

---

## Route Implementation

### 1. Route Utama (web.php)

```php
// routes/web.php
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Public Routes - Company Profile
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');

// Contact Routes (No Auth Required)
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Blog Routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Testimonial Routes (Public)
Route::get('/testimoni', [TestimonialController::class, 'create'])->name('testimonials.create');
Route::post('/testimoni', [TestimonialController::class, 'store'])->name('testimonials.store');
```

### 2. Route Authentication

```php
// User Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Management
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
```

### 3. Route Admin Panel

```php
// Admin Routes dengan Middleware Auth
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    // Resource Controllers
    Route::resource('blog', \App\Http\Controllers\Admin\BlogController::class);
    Route::resource('packages', \App\Http\Controllers\Admin\InternetPackageController::class);
    Route::resource('submissions', \App\Http\Controllers\Admin\ContactSubmissionController::class)
         ->except(['create', 'store']);
    Route::resource('contact-info', \App\Http\Controllers\Admin\ContactInfoController::class);
    Route::resource('service-areas', \App\Http\Controllers\Admin\ServiceAreaController::class);
    
    // Admin Testimonial Management
    Route::resource('testimonials', TestimonialController::class);
    Route::patch('testimonials/{testimonial}/toggle-publish', 
                [TestimonialController::class, 'togglePublish'])
                ->name('testimonials.toggle-publish');
});
```

### 4. Route Analytics

**Route Grouping Pattern**:
- **Public Routes**: Tanpa middleware (halaman utama, kontak, blog view)
- **Authenticated Routes**: Middleware `auth` (dashboard, profile)  
- **Admin Routes**: Middleware `auth` + prefix `admin` (manajemen konten)
- **Resource Routes**: CRUD otomatis dengan Route Model Binding

**Snapshot Route List**:
```
[Gambar Screenshot php artisan route:list - Menampilkan semua route]
```

---

## Blade Templating System

### 1. Layout Master Template

**File**: `resources/views/layouts/app.blade.php`

```php
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'AlpiNet - Internet Cepat & Stabil di Bekasi')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body { font-family: 'Figtree', sans-serif; }
        
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 80px 0;
        }
        
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        
        .btn-primary-custom {
            background: linear-gradient(45deg, #667eea, #764ba2);
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            transition: all 0.3s ease;
        }
    </style>

    @stack('styles')
</head>
<body>
    <!-- Navigation -->
    @include('partials.navbar')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('partials.footer')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
```

### 2. Homepage Template

**File**: `resources/views/home.blade.php`

```php
@extends('layouts.app')

@section('title', 'AlpiNet - Internet Cepat & Stabil di Bekasi')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">
                    Internet Tanpa Batas, 
                    <span class="text-warning">Harga Bersahabat</span>
                </h1>
                <p class="lead mb-4">
                    Nikmati koneksi stabil untuk streaming, belajar online, dan gaming tanpa lag. 
                    Layanan internet cepat & stabil untuk warga Bekasi.
                </p>
                <div class="d-flex gap-3">
                    <a href="{{ url('/contact') }}" class="btn btn-primary-custom btn-lg">
                        <i class="fas fa-phone me-2"></i>Daftar Sekarang
                    </a>
                    <a href="{{ url('/services') }}" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-wifi me-2"></i>Lihat Paket
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <i class="fas fa-wifi" style="font-size: 15rem; opacity: 0.1;"></i>
            </div>
        </div>
    </div>
</section>

<!-- Paket Internet Section -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Paket Internet Populer</h2>
        <div class="row g-4">
            @foreach($packages as $package)
            <div class="col-lg-4 col-md-6">
                <div class="card card-hover border-0 shadow-sm h-100">
                    @if($package->is_popular)
                        <div class="card-header bg-primary text-white text-center">
                            <i class="fas fa-star me-2"></i>Paling Populer
                        </div>
                    @endif
                    <div class="card-body text-center">
                        <h3 class="fw-bold">{{ $package->name }}</h3>
                        <h2 class="text-primary fw-bold mb-3">{{ $package->formatted_price }}</h2>
                        <p class="text-muted">{{ $package->description }}</p>
                        
                        <div class="d-grid">
                            <a href="{{ route('contact') }}" class="btn btn-primary">
                                Pilih Paket
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
```

### 3. Admin Dashboard Template

**File**: `resources/views/admin/dashboard.blade.php`

```php
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
                <div class="card border-0 shadow-sm h-100">
                    <a href="{{ route('admin.blog.index') }}" class="text-decoration-none text-dark">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                    style="width: 50px; height: 50px;">
                                    <i class="fas fa-newspaper"></i>
                                </div>
                                <div>
                                    <h3 class="fw-bold mb-0">{{ \App\Models\BlogPost::count() }}</h3>
                                    <small class="text-muted">Total Posts</small>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- More stats cards... -->
        </div>
    </div>
</section>
@endsection
```

### 4. Partial Templates

**File**: `resources/views/partials/navbar.blade.php`
```php
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="{{ url('/') }}">
            <i class="fas fa-wifi me-2"></i>AlpiNet
        </a>
        
        <div class="navbar-nav ms-auto">
            <a class="nav-link" href="{{ url('/') }}">Home</a>
            <a class="nav-link" href="{{ url('/about') }}">About</a>
            <a class="nav-link" href="{{ url('/services') }}">Services</a>
            <a class="nav-link" href="{{ url('/blog') }}">Blog</a>
            <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
            
            @auth
                <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin</a>
            @endauth
        </div>
    </div>
</nav>
```

### 5. Blade Templating Features yang Digunakan

#### Template Inheritance
- `@extends('layouts.app')` - Mewarisi layout utama
- `@section('title')` - Menentukan title halaman
- `@yield('content')` - Area konten dinamis

#### Conditional Statements  
```php
@auth
    <a href="{{ route('admin.dashboard') }}">Admin Panel</a>
@else
    <a href="{{ route('login') }}">Login</a>
@endauth

@if($package->is_popular)
    <span class="badge bg-warning">Popular</span>
@endif
```

#### Loops
```php
@foreach($packages as $package)
    <div class="package-card">
        <h3>{{ $package->name }}</h3>
        <p>{{ $package->description }}</p>
    </div>
@endforeach

@forelse($posts as $post)
    <article>{{ $post->title }}</article>
@empty
    <p>No posts available</p>
@endforelse
```

#### Includes & Components
```php
@include('partials.navbar')
@include('partials.footer')
@stack('styles')
@stack('scripts')
```

**Snapshot Homepage**:
```
[Gambar Screenshot Homepage - Menampilkan hero section, paket internet, dan fitur]
```

---

## Controller Architecture

### 1. PageController (Public Pages)

**File**: `app/Http/Controllers/PageController.php`

```php
<?php

namespace App\Http\Controllers;

use App\Models\InternetPackage;
use App\Models\ContactInfo;
use App\Models\ServiceArea;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $packages = InternetPackage::active()->limit(3)->get();
        $contactInfo = ContactInfo::active()->get()->groupBy('type');
        
        return view('home', compact('packages', 'contactInfo'));
    }

    public function services()
    {
        $packages = InternetPackage::active()->get();
        $contactInfo = ContactInfo::active()->get()->groupBy('type');
        $serviceAreas = ServiceArea::active()->get()->groupBy('district');
        
        return view('services', compact('packages', 'contactInfo', 'serviceAreas'));
    }

    public function about()
    {
        $contactInfo = ContactInfo::active()->get()->groupBy('type');
        
        return view('about', compact('contactInfo'));
    }
}
```

### 2. Admin BlogController (CRUD Operations)

**File**: `app/Http/Controllers/Admin/BlogController.php`

```php
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::with('author')->latest()->paginate(10);
        return view('admin.blog.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'summary' => 'required|max:500',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_published' => 'boolean'
        ]);

        $imageData = null;
        if ($request->hasFile('image')) {
            $imageData = $this->compressAndStoreImage($request->file('image'));
        }

        BlogPost::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'summary' => $request->summary,
            'content' => $request->input('content'),
            'image' => $imageData,
            'author_id' => auth()->id(),
            'is_published' => $request->has('is_published'),
            'published_at' => $request->has('is_published') ? now() : null,
        ]);

        return redirect()->route('admin.blog.index')
                         ->with('success', 'Blog post created successfully!');
    }

    public function show(BlogPost $blog)
    {
        return view('admin.blog.show', compact('blog'));
    }

    public function edit(BlogPost $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, BlogPost $blog)
    {
        $request->validate([
            'title' => 'required|max:255',
            'summary' => 'required|max:500',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_published' => 'boolean'
        ]);

        $updateData = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'summary' => $request->summary,
            'content' => $request->input('content'),
            'is_published' => $request->has('is_published'),
        ];

        if ($request->hasFile('image')) {
            $updateData['image'] = $this->compressAndStoreImage($request->file('image'));
        }

        if ($request->has('is_published') && !$blog->published_at) {
            $updateData['published_at'] = now();
        }

        $blog->update($updateData);

        return redirect()->route('admin.blog.index')
                         ->with('success', 'Blog post updated successfully!');
    }

    public function destroy(BlogPost $blog)
    {
        $blog->delete();

        return redirect()->route('admin.blog.index')
                         ->with('success', 'Blog post deleted successfully!');
    }

    private function compressAndStoreImage($image)
    {
        // Image compression and storage logic
        $imageData = file_get_contents($image->getRealPath());
        return base64_encode($imageData);
    }
}
```

### 3. ContactController (Form Handling)

```php
<?php

namespace App\Http\Controllers;

use App\Models\ContactSubmission;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contactInfo = ContactInfo::active()->get()->groupBy('type');
        return view('contact', compact('contactInfo'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:20',
            'subject' => 'required|max:255',
            'message' => 'required|max:1000',
            'package_interest' => 'nullable|string'
        ]);

        ContactSubmission::create($request->all());

        return redirect()->back()
                         ->with('success', 'Pesan Anda telah terkirim! Kami akan segera menghubungi Anda.');
    }
}
```

### 4. Controller Design Patterns

#### Resource Controllers
```php
// Automatic CRUD routes dengan Route Model Binding
Route::resource('blog', BlogController::class);

// Generated routes:
// GET /blog - index()
// GET /blog/create - create()  
// POST /blog - store()
// GET /blog/{id} - show()
// GET /blog/{id}/edit - edit()
// PUT/PATCH /blog/{id} - update()
// DELETE /blog/{id} - destroy()
```

#### Middleware Integration
```php
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }
}
```

#### Request Validation
```php
public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|max:255|unique:blog_posts,title',
        'content' => 'required|min:100',
        'image' => 'nullable|image|max:2048'
    ]);

    // Process validated data
}
```

**Snapshot Admin Blog Management**:
```
[Gambar Screenshot Admin Blog Index - Tabel dengan list blog posts]
```

---

## Model Implementation

### 1. Eloquent Relationships

#### One-to-Many: User -> BlogPosts
```php
// User Model
class User extends Authenticatable
{
    public function blogPosts()
    {
        return $this->hasMany(BlogPost::class, 'author_id');
    }
}

// BlogPost Model  
class BlogPost extends Model
{
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
```

#### Usage in Controller
```php
// Eager loading untuk menghindari N+1 problem
$posts = BlogPost::with('author')->latest()->get();

// Dalam blade template
@foreach($posts as $post)
    <p>Author: {{ $post->author->name }}</p>
@endforeach
```

### 2. Model Scopes

#### Global Scopes
```php
// InternetPackage Model
public function scopeActive($query)
{
    return $query->where('is_active', true);
}

public function scopePopular($query)
{
    return $query->where('is_popular', true);
}

// Usage
$popularPackages = InternetPackage::active()->popular()->get();
$activePackages = InternetPackage::active()->orderBy('price')->get();
```

#### Query Scopes untuk BlogPost
```php
public function scopePublished($query)
{
    return $query->where('is_published', true)
                ->whereNotNull('published_at')
                ->where('published_at', '<=', now());
}

public function scopeLatest($query)
{
    return $query->orderBy('published_at', 'desc');
}

// Usage 
$recentPosts = BlogPost::published()->latest()->limit(5)->get();
```

### 3. Accessors & Mutators

#### Price Formatting
```php
// InternetPackage Model
public function getFormattedPriceAttribute()
{
    return 'Rp ' . number_format($this->price, 0, ',', '.');
}

// Usage dalam Blade
{{ $package->formatted_price }} // Output: Rp 150.000
```

#### Auto Slug Generation
```php
// BlogPost Model
public function setTitleAttribute($value)
{
    $this->attributes['title'] = $value;
    $this->attributes['slug'] = Str::slug($value);
}

// Date Formatting
public function getFormattedPublishedDateAttribute()
{
    return $this->published_at ? $this->published_at->format('d F Y') : null;
}
```

### 4. Casting & Validation

#### Data Type Casting
```php
protected $casts = [
    'published_at' => 'datetime',
    'is_published' => 'boolean',
    'features' => 'array',        // JSON to Array
    'price' => 'decimal:2'        // Decimal precision
];
```

#### Mass Assignment Protection
```php
protected $fillable = [
    'title', 'slug', 'summary', 'content', 
    'image', 'author_id', 'published_at', 'is_published'
];

protected $guarded = ['id', 'created_at', 'updated_at'];
```

### 5. Factory & Seeding

#### BlogPost Factory
```php
// database/factories/BlogPostFactory.php
class BlogPostFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'summary' => $this->faker->paragraph(2),
            'content' => $this->faker->paragraphs(5, true),
            'author_id' => User::factory(),
            'is_published' => $this->faker->boolean(80),
            'published_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
```

#### Database Seeder
```php
// database/seeders/BlogPostSeeder.php
class BlogPostSeeder extends Seeder
{
    public function run()
    {
        BlogPost::factory()->count(20)->create();
        
        // Specific blog posts
        BlogPost::create([
            'title' => 'Mengapa AlpiNet Pilihan Terbaik untuk Internet Rumah',
            'summary' => 'Alasan utama kenapa AlpiNet menjadi provider internet terdepan...',
            'content' => '...',
            'author_id' => 1,
            'is_published' => true,
            'published_at' => now(),
        ]);
    }
}
```

**Snapshot Model Structure**:
```
[Gambar Diagram Class Models - Menunjukkan relationship dan struktur model]
```

---

## Authentication & Authorization

### 1. Laravel Breeze Implementation

#### Authentication Routes
```php
// routes/auth.php
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
         ->name('password.request');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');
});
```

### 2. Middleware Protection

#### Route Middleware
```php
// Protected user routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Admin routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('blog', BlogController::class);
    Route::resource('packages', InternetPackageController::class);
});
```

#### Controller Middleware
```php
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin'); // Custom admin middleware
    }
}
```

### 3. Blade Authentication Directives

```php
<!-- Navigation dengan kondisi auth -->
<nav class="navbar">
    <div class="navbar-nav">
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ url('/about') }}">About</a>
        
        @auth
            <a href="{{ route('admin.dashboard') }}">Admin Panel</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout ({{ auth()->user()->name }})</button>
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endauth
    </div>
</nav>

<!-- Admin dashboard greeting -->
@auth
    <h2>Welcome back, {{ auth()->user()->name }}!</h2>
    <p>Last login: {{ auth()->user()->updated_at->diffForHumans() }}</p>
@endauth
```

### 4. User Registration & Profile

#### Registration Form
```php
<!-- resources/views/auth/register.blade.php -->
<form method="POST" action="{{ route('register') }}">
    @csrf
    
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
        @error('name')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>
    
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        @error('email')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>
    
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" required>
        @error('password')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>
    
    <button type="submit">Register</button>
</form>
```

#### Profile Management
```php
// ProfileController
public function update(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
    ]);

    auth()->user()->update([
        'name' => $request->name,
        'email' => $request->email,
    ]);

    return redirect()->back()->with('success', 'Profile updated successfully!');
}
```

**Snapshot Login Page**:
```
[Gambar Screenshot Login Form - Form login dengan styling Bootstrap]
```

---

## Admin Dashboard

### 1. Dashboard Overview

**File**: `resources/views/admin/dashboard.blade.php`

#### Statistics Cards
```php
<!-- Stats Cards Section -->
<div class="row g-4 mb-5">
    <div class="col-lg-3 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <a href="{{ route('admin.blog.index') }}" class="text-decoration-none text-dark">
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
            </a>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <a href="{{ route('admin.packages.index') }}" class="text-decoration-none text-dark">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="fas fa-wifi"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold mb-0">{{ \App\Models\InternetPackage::active()->count() }}</h3>
                            <small class="text-muted">Active Packages</small>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <a href="{{ route('admin.submissions.index') }}" class="text-decoration-none text-dark">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="bg-warning text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold mb-0">{{ \App\Models\ContactSubmission::where('status', 'new')->count() }}</h3>
                            <small class="text-muted">New Messages</small>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <a href="{{ route('admin.testimonials.index') }}" class="text-decoration-none text-dark">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="fas fa-star"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold mb-0">{{ \App\Models\Testimonial::published()->count() }}</h3>
                            <small class="text-muted">Testimonials</small>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
```

### 2. Blog Management Interface

**File**: `resources/views/admin/blog/index.blade.php`

```php
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
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('admin.blog.show', $post) }}" class="btn btn-outline-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.blog.edit', $post) }}" class="btn btn-outline-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form method="POST" action="{{ route('admin.blog.destroy', $post) }}" 
                                              style="display: inline;" 
                                              onsubmit="return confirm('Are you sure you want to delete this post?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">
                                    No blog posts found. <a href="{{ route('admin.blog.create') }}">Create your first post</a>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="d-flex justify-content-center">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
```

### 3. Admin Navigation

```php
<!-- Quick Actions Section -->
<div class="row g-4">
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fas fa-cogs me-2"></i>Content Management</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-primary text-start">
                        <i class="fas fa-newspaper me-2"></i>Manage Blog Posts
                    </a>
                    <a href="{{ route('admin.packages.index') }}" class="btn btn-outline-success text-start">
                        <i class="fas fa-wifi me-2"></i>Manage Internet Packages
                    </a>
                    <a href="{{ route('admin.service-areas.index') }}" class="btn btn-outline-info text-start">
                        <i class="fas fa-map-marker-alt me-2"></i>Manage Service Areas
                    </a>
                    <a href="{{ route('admin.contact-info.index') }}" class="btn btn-outline-warning text-start">
                        <i class="fas fa-address-book me-2"></i>Manage Contact Information
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-secondary text-white">
                <h5 class="mb-0"><i class="fas fa-users me-2"></i>Customer Management</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.submissions.index') }}" class="btn btn-outline-primary text-start">
                        <i class="fas fa-envelope me-2"></i>Contact Submissions
                        @if(\App\Models\ContactSubmission::where('status', 'new')->count() > 0)
                            <span class="badge bg-danger ms-auto">
                                {{ \App\Models\ContactSubmission::where('status', 'new')->count() }}
                            </span>
                        @endif
                    </a>
                    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-success text-start">
                        <i class="fas fa-star me-2"></i>Customer Testimonials
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
```

**Snapshot Admin Dashboard**:
```
[Gambar Screenshot Admin Dashboard - Overview dengan stats cards dan quick actions]
```

---

## Fitur-Fitur Utama

### 1. Blog System

#### CRUD Operations
- **Create**: Form dengan WYSIWYG editor untuk konten
- **Read**: Listing dengan pagination dan filter
- **Update**: Edit dengan preview
- **Delete**: Soft delete dengan konfirmasi

```php
// Blog Index dengan Search & Filter
public function index(Request $request)
{
    $query = BlogPost::with('author');
    
    if ($request->search) {
        $query->where('title', 'like', '%' . $request->search . '%')
              ->orWhere('summary', 'like', '%' . $request->search . '%');
    }
    
    if ($request->status) {
        $query->where('is_published', $request->status === 'published');
    }
    
    $posts = $query->latest()->paginate(10);
    
    return view('admin.blog.index', compact('posts'));
}
```

#### Image Upload & Compression
```php
private function compressAndStoreImage($image)
{
    $imageData = file_get_contents($image->getRealPath());
    
    // Create image resource
    $img = imagecreatefromstring($imageData);
    
    // Resize if needed
    $width = imagesx($img);
    $height = imagesy($img);
    
    if ($width > 800) {
        $newWidth = 800;
        $newHeight = ($height * $newWidth) / $width;
        
        $resized = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($resized, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        
        ob_start();
        imagejpeg($resized, null, 80);
        $imageData = ob_get_clean();
    }
    
    return base64_encode($imageData);
}
```

### 2. Internet Package Management

#### Dynamic Package Display
```php
<!-- resources/views/services.blade.php -->
<div class="row g-4">
    @foreach($packages as $package)
    <div class="col-lg-4 col-md-6">
        <div class="card card-hover border-0 shadow-sm h-100 {{ $package->is_popular ? 'border-warning' : '' }}">
            @if($package->is_popular)
                <div class="card-header bg-warning text-center">
                    <i class="fas fa-star me-2"></i>Most Popular
                </div>
            @endif
            
            <div class="card-body text-center">
                <h3 class="fw-bold">{{ $package->name }}</h3>
                <div class="display-6 text-primary fw-bold mb-3">{{ $package->formatted_price }}</div>
                <p class="text-muted">{{ $package->description }}</p>
                
                <ul class="list-unstyled mb-4">
                    @if(is_array($package->features))
                        @foreach($package->features as $feature)
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>{{ $feature }}
                        </li>
                        @endforeach
                    @endif
                </ul>
                
                <div class="d-grid">
                    <a href="{{ route('contact') }}" class="btn btn-{{ $package->is_popular ? 'warning' : 'primary' }}">
                        Choose This Package
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
```

### 3. Contact Form dengan Validation

```php
<!-- Contact Form -->
<form method="POST" action="{{ route('contact.store') }}" id="contactForm">
    @csrf
    
    <div class="row g-3">
        <div class="col-md-6">
            <label for="name" class="form-label">Full Name *</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                   name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col-md-6">
            <label for="email" class="form-label">Email Address *</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                   name="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col-md-6">
            <label for="phone" class="form-label">Phone Number *</label>
            <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                   name="phone" value="{{ old('phone') }}" required>
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col-md-6">
            <label for="package_interest" class="form-label">Package Interest</label>
            <select class="form-select" name="package_interest">
                <option value="">Select Package (Optional)</option>
                @foreach($packages ?? [] as $package)
                    <option value="{{ $package->name }}" {{ old('package_interest') == $package->name ? 'selected' : '' }}>
                        {{ $package->name }} - {{ $package->formatted_price }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="col-12">
            <label for="subject" class="form-label">Subject *</label>
            <input type="text" class="form-control @error('subject') is-invalid @enderror" 
                   name="subject" value="{{ old('subject') }}" required>
            @error('subject')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col-12">
            <label for="message" class="form-label">Message *</label>
            <textarea class="form-control @error('message') is-invalid @enderror" 
                      name="message" rows="5" required>{{ old('message') }}</textarea>
            @error('message')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col-12">
            <button type="submit" class="btn btn-primary btn-lg">
                <i class="fas fa-paper-plane me-2"></i>Send Message
            </button>
        </div>
    </div>
</form>
```

### 4. Testimonial System

```php
// Testimonial Model dengan approval system
class Testimonial extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'package_used', 
        'rating', 'message', 'is_published', 'published_at'
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_published' => 'boolean',
        'published_at' => 'datetime'
    ];

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('published_at', 'desc');
    }
}

// Toggle publish method di controller
public function togglePublish(Testimonial $testimonial)
{
    $testimonial->update([
        'is_published' => !$testimonial->is_published,
        'published_at' => !$testimonial->is_published ? now() : null
    ]);

    $status = $testimonial->is_published ? 'published' : 'unpublished';
    
    return redirect()->back()
                     ->with('success', "Testimonial has been {$status} successfully!");
}
```

### 5. Search & Filter Features

```php
<!-- Blog Search -->
<form method="GET" class="mb-4">
    <div class="row g-3">
        <div class="col-md-4">
            <input type="text" class="form-control" name="search" 
                   value="{{ request('search') }}" placeholder="Search posts...">
        </div>
        <div class="col-md-3">
            <select class="form-select" name="status">
                <option value="">All Status</option>
                <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
            </select>
        </div>
        <div class="col-md-3">
            <select class="form-select" name="author">
                <option value="">All Authors</option>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}" {{ request('author') == $author->id ? 'selected' : '' }}>
                        {{ $author->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Filter</button>
        </div>
    </div>
</form>
```

**Snapshot Contact Form**:
```
[Gambar Screenshot Contact Form - Form kontak dengan validasi dan styling Bootstrap]
```

---

## Screenshots

### 1. Homepage
```
[Gambar Homepage AlpiNet - Hero section dengan gradient background, paket internet populer, dan fitur unggulan]
```
**Deskripsi**: Homepage menampilkan hero section dengan call-to-action untuk registrasi, carousel paket internet populer, dan section fitur unggulan dengan ikon dan deskripsi.

### 2. Services Page
```
[Gambar Services Page - Grid paket internet dengan card design dan badge "Most Popular"]
```
**Deskripsi**: Halaman services menampilkan semua paket internet dalam grid layout, dengan highlight untuk paket populer dan detail fitur masing-masing paket.

### 3. Admin Dashboard
```
[Gambar Admin Dashboard - Statistics cards dan quick actions menu]
```
**Deskripsi**: Dashboard admin dengan cards statistik (total posts, packages, messages, testimonials) dan menu quick actions untuk manajemen konten.

### 4. Blog Management
```
[Gambar Blog Management - Tabel listing blog posts dengan actions (view, edit, delete)]
```
**Deskripsi**: Interface manajemen blog dengan tabel data posts, status publish/draft, dan action buttons untuk CRUD operations.

### 5. Blog Create/Edit Form
```
[Gambar Blog Create Form - Form input dengan WYSIWYG editor dan image upload]
```
**Deskripsi**: Form create/edit blog post dengan rich text editor, upload gambar, dan preview functionality.

### 6. Contact Form
```
[Gambar Contact Form - Form kontak dengan validasi dan dropdown package selection]
```
**Deskripsi**: Form kontak dengan validasi real-time, dropdown untuk pemilihan paket, dan notifikasi success/error.

### 7. Login Page
```
[Gambar Login Page - Form login dengan styling Bootstrap dan remember me option]
```
**Deskripsi**: Halaman login dengan form authentication, link ke registration, dan forgot password functionality.

### 8. Mobile Responsive
```
[Gambar Mobile View - Homepage dan navigation dalam tampilan mobile]
```
**Deskripsi**: Tampilan responsive untuk mobile device dengan collapsed navigation dan optimized layout.

### 9. Database ERD
```
[Gambar Database ERD - Diagram relasi antar tabel database]
```
**Deskripsi**: Entity Relationship Diagram menunjukkan struktur database dengan relasi antar tabel users, blog_posts, packages, testimonials, dll.

### 10. Route List
```
[Gambar Screenshot Terminal - Output dari php artisan route:list]
```
**Deskripsi**: Listing semua routes yang tersedia dalam aplikasi, termasuk method, URI, name, dan middleware.

---

## Kesimpulan

Proyek Laravel AlpiNet telah berhasil mengimplementasikan:

### ✅ Fitur yang Telah Dikembangkan:
1. **Company Profile Website** dengan homepage, about, dan services
2. **Blog System** dengan CRUD operations dan image upload
3. **Contact Management** dengan form submission dan admin dashboard
4. **Internet Package Management** dengan dynamic pricing display
5. **User Authentication** menggunakan Laravel Breeze
6. **Admin Dashboard** dengan statistics dan content management
7. **Testimonial System** dengan approval workflow
8. **Responsive Design** menggunakan Bootstrap 5

### 🛠️ Teknologi yang Digunakan:
- **Backend**: Laravel 11, PHP 8.2+, MySQL
- **Frontend**: Blade Templates, Bootstrap 5, Font Awesome
- **Authentication**: Laravel Breeze dengan email verification
- **Database**: Eloquent ORM dengan migrations dan seeders
- **Styling**: Custom CSS dengan gradient themes

### 📊 Performance & Security:
- Route caching dan query optimization
- Image compression untuk blog uploads
- CSRF protection pada semua forms
- Input validation dan sanitization
- Middleware-based access control

### 🚀 Deployment Ready:
- Environment configuration
- Database migrations ready
- Asset compilation dengan Vite
- Error handling dan logging

Proyek ini siap untuk deployment ke production dengan sedikit konfigurasi tambahan untuk domain dan hosting.

---

**Generated by**: Laravel Implementation Analysis  
**Date**: December 9, 2025  
**Framework**: Laravel 11  
**Database**: MySQL  