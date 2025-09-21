@extends('layouts.app')

@section('title', 'About Us - TechCorp')

@section('content')
<!-- Page Header -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-4">About TechCorp</h1>
                <p class="lead">
                    Discover our journey, values, and commitment to delivering exceptional technology solutions.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Company History -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="fw-bold mb-4">Our Story</h2>
                <p class="text-muted mb-4">
                    Founded in 2015 by a team of passionate technologists, TechCorp began as a small startup 
                    with a big vision: to democratize technology and make it accessible to businesses of all sizes.
                </p>
                <p class="text-muted mb-4">
                    What started as a three-person team working from a garage has grown into a dynamic company 
                    of over 50 professionals, serving clients across multiple industries and continents.
                </p>
                <p class="text-muted">
                    Today, we're proud to be recognized as a leading technology solutions provider, known for 
                    our innovative approach, commitment to quality, and unwavering focus on client success.
                </p>
            </div>
            <div class="col-lg-6 text-center">
                <div class="bg-light rounded p-5">
                    <i class="fas fa-history text-primary" style="font-size: 8rem; opacity: 0.3;"></i>
                    <h4 class="fw-bold mt-3">8+ Years</h4>
                    <p class="text-muted mb-0">of Innovation & Growth</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision & Mission -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="fw-bold mb-3">Our Vision & Mission</h2>
                <p class="lead text-muted">
                    Guiding principles that drive everything we do at TechCorp.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Vision -->
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow-sm card-hover">
                    <div class="card-body p-5 text-center">
                        <div class="text-primary mb-4">
                            <i class="fas fa-eye fa-3x"></i>
                        </div>
                        <h3 class="fw-bold mb-4">Our Vision</h3>
                        <p class="text-muted">
                            To be the global leader in innovative technology solutions, empowering businesses 
                            to achieve their full potential through cutting-edge digital transformation and 
                            sustainable technological advancement.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Mission -->
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow-sm card-hover">
                    <div class="card-body p-5 text-center">
                        <div class="text-primary mb-4">
                            <i class="fas fa-bullseye fa-3x"></i>
                        </div>
                        <h3 class="fw-bold mb-4">Our Mission</h3>
                        <p class="text-muted">
                            To deliver exceptional technology solutions that drive business growth, enhance 
                            operational efficiency, and create lasting value for our clients through 
                            innovation, expertise, and unwavering commitment to excellence.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Core Values -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="fw-bold mb-3">Our Core Values</h2>
                <p class="lead text-muted">
                    The fundamental beliefs that shape our culture and guide our actions.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Innovation -->
            <div class="col-lg-4 col-md-6">
                <div class="text-center">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-lightbulb fa-2x"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Innovation</h5>
                    <p class="text-muted">
                        We continuously explore new technologies and creative solutions to stay ahead 
                        of the curve and provide our clients with cutting-edge advantages.
                    </p>
                </div>
            </div>

            <!-- Excellence -->
            <div class="col-lg-4 col-md-6">
                <div class="text-center">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-star fa-2x"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Excellence</h5>
                    <p class="text-muted">
                        We are committed to delivering the highest quality in everything we do, 
                        from code quality to client service and project management.
                    </p>
                </div>
            </div>

            <!-- Integrity -->
            <div class="col-lg-4 col-md-6">
                <div class="text-center">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-handshake fa-2x"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Integrity</h5>
                    <p class="text-muted">
                        We conduct business with honesty, transparency, and ethical practices, 
                        building trust through reliable and authentic relationships.
                    </p>
                </div>
            </div>

            <!-- Collaboration -->
            <div class="col-lg-4 col-md-6">
                <div class="text-center">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Collaboration</h5>
                    <p class="text-muted">
                        We believe in the power of teamwork, both within our organization and 
                        with our clients, to achieve extraordinary results together.
                    </p>
                </div>
            </div>

            <!-- Adaptability -->
            <div class="col-lg-4 col-md-6">
                <div class="text-center">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-sync-alt fa-2x"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Adaptability</h5>
                    <p class="text-muted">
                        We embrace change and continuously evolve our skills and approaches to 
                        meet the dynamic needs of the technology landscape.
                    </p>
                </div>
            </div>

            <!-- Customer Focus -->
            <div class="col-lg-4 col-md-6">
                <div class="text-center">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-heart fa-2x"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Customer Focus</h5>
                    <p class="text-muted">
                        Our clients' success is our success. We prioritize understanding their needs 
                        and delivering solutions that exceed their expectations.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Leadership -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="fw-bold mb-3">Leadership Team</h2>
                <p class="lead text-muted">
                    Meet the visionaries and experts leading TechCorp into the future.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <!-- CEO -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm card-hover text-center">
                    <div class="card-body p-4">
                        <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 100px; height: 100px;">
                            <i class="fas fa-user-tie fa-3x text-primary"></i>
                        </div>
                        <h5 class="fw-bold">John Anderson</h5>
                        <p class="text-primary mb-2">Chief Executive Officer</p>
                        <p class="text-muted small">
                            15+ years of experience in technology leadership and business strategy.
                        </p>
                    </div>
                </div>
            </div>

            <!-- CTO -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm card-hover text-center">
                    <div class="card-body p-4">
                        <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 100px; height: 100px;">
                            <i class="fas fa-laptop-code fa-3x text-primary"></i>
                        </div>
                        <h5 class="fw-bold">Sarah Chen</h5>
                        <p class="text-primary mb-2">Chief Technology Officer</p>
                        <p class="text-muted small">
                            Expert in software architecture and emerging technologies with 12+ years experience.
                        </p>
                    </div>
                </div>
            </div>

            <!-- COO -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm card-hover text-center">
                    <div class="card-body p-4">
                        <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 100px; height: 100px;">
                            <i class="fas fa-cogs fa-3x text-primary"></i>
                        </div>
                        <h5 class="fw-bold">Michael Rodriguez</h5>
                        <p class="text-primary mb-2">Chief Operating Officer</p>
                        <p class="text-muted small">
                            Operations excellence and project management specialist with 10+ years experience.
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
                <h2 class="fw-bold mb-3">Ready to Work with Us?</h2>
                <p class="lead text-muted mb-4">
                    Join the growing list of successful businesses that trust TechCorp with their technology needs.
                </p>
                <div class="d-flex gap-3 justify-content-center">
                    <a href="{{ url('/services') }}" class="btn btn-primary-custom btn-lg">
                        <i class="fas fa-cogs me-2"></i>View Our Services
                    </a>
                    <a href="{{ url('/contact') }}" class="btn btn-outline-primary btn-lg">
                        <i class="fas fa-envelope me-2"></i>Get in Touch
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection