<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

// Company Profile Website Routes
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');

// Contact Routes (Public - No Auth Required)
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Testimonial Routes (Public)
Route::get('/testimoni', [TestimonialController::class, 'create'])->name('testimonials.create');
Route::post('/testimoni', [TestimonialController::class, 'store'])->name('testimonials.store');

// Blog Routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// User Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    Route::resource('blog', \App\Http\Controllers\Admin\BlogController::class);
    Route::resource('packages', \App\Http\Controllers\Admin\InternetPackageController::class);
    Route::resource('submissions', \App\Http\Controllers\Admin\ContactSubmissionController::class)->except(['create', 'store']);
    Route::resource('contact-info', \App\Http\Controllers\Admin\ContactInfoController::class);
    Route::resource('service-areas', \App\Http\Controllers\Admin\ServiceAreaController::class);
    
    // Admin Testimonial Routes
    Route::resource('testimonials', TestimonialController::class);
    Route::patch('testimonials/{testimonial}/toggle-publish', [TestimonialController::class, 'togglePublish'])->name('testimonials.toggle-publish');
});

require __DIR__.'/auth.php';
