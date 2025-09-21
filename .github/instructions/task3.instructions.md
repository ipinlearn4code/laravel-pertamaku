---
applyTo: '**'
---
# GitHub Copilot Instructions  
## Project: Company Profile Website with Laravel Blade  

---

## Goal
Build a **Company Profile Website** using **Laravel** and **Blade Templating Engine**.  
The website should implement an **advanced layouting system** with reusable components.  
---

## Requirements
1. Use **Blade Layouts** for a consistent main structure (`layouts/app.blade.php`).  
2. Create **partials** (e.g., navbar, footer) that can be included in every page.  
3. Implement at least **4 pages**:
   - Home → short company profile.  
   - About → company history, vision, mission.  
   - Services → list of services offered.  
   - Contact → contact info + form.  
4. Use `@extends`, `@section`, `@yield`, and `@include` correctly.  
5. Routes should be defined in `web.php` for each page.  

---

## File Structure Example
```plaintext
resources/views/
│
├── layouts/
│ └── app.blade.php # Main layout with @yield('content')
│
├── partials/
│ ├── navbar.blade.php # Navigation bar
│ └── footer.blade.php # Footer
│
├── home.blade.php # Home page
├── about.blade.php # About page
├── services.blade.php # Services page
└── contact.blade.php # Contact page

---

## Blade Template Flow
- **Layout (`layouts/app.blade.php`)**:  
  Contains HTML skeleton, includes navbar & footer, and yields content.  

- **Partials (`partials/*.blade.php`)**:  
  Navbar and footer as reusable components.  

- **Pages (`home.blade.php`, etc.)**:  
  Extend the layout and define `@section('content')`.  

---

## Routing Example (`routes/web.php`)
```php
Route::get('/', fn() => view('home'));
Route::get('/about', fn() => view('about'));
Route::get('/services', fn() => view('services'));
Route::get('/contact', fn() => view('contact'));