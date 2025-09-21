<?php

use Illuminate\Support\Facades\Route;

// Company Profile Website Routes
// Home page - displays company overview and introduction
Route::get('/', function () {
    return view('home');
})->name('home');

// About page - company history, vision, mission, and team
Route::get('/about', function () {
    return view('about');
})->name('about');

// Services page - list of services offered by the company
Route::get('/services', function () {
    return view('services');
})->name('services');

// Contact page - contact information and contact form
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
