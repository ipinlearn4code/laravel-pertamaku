@extends('layouts.app')

@section('title', 'TechCorp - Leading Technology Solutions')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">
                    Innovating the Future with 
                    <span class="text-warning">Technology</span>
                </h1>
                <p class="lead mb-4">
                    TechCorp is a leading technology solutions provider, specializing in cutting-edge 
                    software development, digital transformation, and innovative IT consulting services.
                </p>
                <div class="d-flex gap-3">
                    <a href="{{ url('/services') }}" class="btn btn-primary-custom btn-lg">
                        <i class="fas fa-rocket me-2"></i>Our Services
                    </a>
                    <a href="{{ url('/contact') }}" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-phone me-2"></i>Get Started
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <i class="fas fa-laptop-code" style="font-size: 15rem; opacity: 0.1;"></i>
            </div>
        </div>
    </div>
</section>

<!-- Company Overview -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="fw-bold mb-3">About TechCorp</h2>
                <p class="lead text-muted">
                    Founded in 2015, TechCorp has been at the forefront of technological innovation, 
                    helping businesses transform their operations through smart technology solutions.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Experience -->
            <div class="col-md-4 text-center">
                <div class="card h-100 border-0 shadow-sm card-hover">
                    <div class="card-body p-4">
                        <div class="text-primary mb-3">
                            <i class="fas fa-award fa-3x"></i>
                        </div>
                        <h4 class="fw-bold">8+ Years</h4>
                        <p class="text-muted mb-0">
                            Of excellence in delivering innovative technology solutions to clients worldwide.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Projects -->
            <div class="col-md-4 text-center">
                <div class="card h-100 border-0 shadow-sm card-hover">
                    <div class="card-body p-4">
                        <div class="text-primary mb-3">
                            <i class="fas fa-project-diagram fa-3x"></i>
                        </div>
                        <h4 class="fw-bold">500+</h4>
                        <p class="text-muted mb-0">
                            Successfully completed projects for startups, SMEs, and enterprise clients.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Team -->
            <div class="col-md-4 text-center">
                <div class="card h-100 border-0 shadow-sm card-hover">
                    <div class="card-body p-4">
                        <div class="text-primary mb-3">
                            <i class="fas fa-users fa-3x"></i>
                        </div>
                        <h4 class="fw-bold">50+</h4>
                        <p class="text-muted mb-0">
                            Dedicated professionals including developers, designers, and consultants.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Key Features -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="fw-bold mb-3">Why Choose TechCorp?</h2>
                <p class="lead text-muted">
                    We combine technical expertise with business acumen to deliver solutions that drive growth.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Innovation -->
            <div class="col-lg-6">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-lightbulb fa-lg"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="fw-bold">Innovation-Driven</h5>
                        <p class="text-muted mb-0">
                            We stay ahead of technology trends to provide cutting-edge solutions that give 
                            your business a competitive advantage.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Quality -->
            <div class="col-lg-6">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-star fa-lg"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="fw-bold">Quality Assurance</h5>
                        <p class="text-muted mb-0">
                            Our rigorous testing and quality assurance processes ensure that every project 
                            meets the highest standards of excellence.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Support -->
            <div class="col-lg-6">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-headset fa-lg"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="fw-bold">24/7 Support</h5>
                        <p class="text-muted mb-0">
                            Our dedicated support team is available round-the-clock to assist you with 
                            any technical issues or questions.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Scalability -->
            <div class="col-lg-6">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-expand-arrows-alt fa-lg"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h5 class="fw-bold">Scalable Solutions</h5>
                        <p class="text-muted mb-0">
                            Our solutions are designed to grow with your business, ensuring long-term 
                            value and adaptability to changing needs.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="fw-bold mb-3">Ready to Transform Your Business?</h2>
                <p class="lead text-muted mb-4">
                    Let's discuss how TechCorp can help you achieve your technology goals and drive your business forward.
                </p>
                <div class="d-flex gap-3 justify-content-center">
                    <a href="{{ url('/contact') }}" class="btn btn-primary-custom btn-lg">
                        <i class="fas fa-phone me-2"></i>Contact Us Today
                    </a>
                    <a href="{{ url('/about') }}" class="btn btn-outline-primary btn-lg">
                        <i class="fas fa-info-circle me-2"></i>Learn More
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection