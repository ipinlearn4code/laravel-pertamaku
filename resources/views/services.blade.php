@extends('layouts.app')

@section('title', 'Our Services - TechCorp')

@section('content')
<!-- Page Header -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-4">Our Services</h1>
                <p class="lead">
                    Comprehensive technology solutions tailored to drive your business forward.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Services Overview -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="fw-bold mb-3">What We Offer</h2>
                <p class="lead text-muted">
                    From concept to deployment, we provide end-to-end technology solutions that transform your business operations and accelerate growth.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Web Development -->
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow-sm card-hover">
                    <div class="card-body p-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 60px; height: 60px;">
                                <i class="fas fa-globe fa-lg"></i>
                            </div>
                            <h3 class="fw-bold mb-0">Web Development</h3>
                        </div>
                        <p class="text-muted mb-4">
                            Custom web applications and websites built with modern frameworks and technologies. 
                            We create responsive, scalable, and secure web solutions.
                        </p>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Custom Web Applications</li>
                            <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>E-commerce Platforms</li>
                            <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Content Management Systems</li>
                            <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Progressive Web Apps (PWA)</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Mobile Applications -->
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow-sm card-hover">
                    <div class="card-body p-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 60px; height: 60px;">
                                <i class="fas fa-mobile-alt fa-lg"></i>
                            </div>
                            <h3 class="fw-bold mb-0">Mobile Applications</h3>
                        </div>
                        <p class="text-muted mb-4">
                            Native and cross-platform mobile applications for iOS and Android. 
                            Engaging user experiences with optimal performance and functionality.
                        </p>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>iOS & Android Apps</li>
                            <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Cross-platform Solutions</li>
                            <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>App Store Optimization</li>
                            <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Maintenance & Updates</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Cloud Solutions -->
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow-sm card-hover">
                    <div class="card-body p-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 60px; height: 60px;">
                                <i class="fas fa-cloud fa-lg"></i>
                            </div>
                            <h3 class="fw-bold mb-0">Cloud Solutions</h3>
                        </div>
                        <p class="text-muted mb-4">
                            Cloud migration, infrastructure setup, and optimization services. 
                            Leverage the power of cloud computing for scalability and efficiency.
                        </p>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Cloud Migration</li>
                            <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Infrastructure Management</li>
                            <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>DevOps & CI/CD</li>
                            <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Security & Compliance</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- IT Consulting -->
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow-sm card-hover">
                    <div class="card-body p-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 60px; height: 60px;">
                                <i class="fas fa-chart-line fa-lg"></i>
                            </div>
                            <h3 class="fw-bold mb-0">IT Consulting</h3>
                        </div>
                        <p class="text-muted mb-4">
                            Strategic IT consulting to align technology with your business goals. 
                            Expert guidance for digital transformation and technology roadmaps.
                        </p>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Digital Strategy</li>
                            <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Technology Assessment</li>
                            <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Process Optimization</li>
                            <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>System Integration</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Additional Services -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="fw-bold mb-3">Additional Capabilities</h2>
                <p class="lead text-muted">
                    Specialized services to complement our core offerings and provide comprehensive solutions.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <!-- UI/UX Design -->
            <div class="col-lg-4 col-md-6">
                <div class="text-center">
                    <div class="bg-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow-sm" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-palette fa-2x text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-3">UI/UX Design</h5>
                    <p class="text-muted">
                        User-centered design that creates intuitive and engaging experiences across all platforms.
                    </p>
                </div>
            </div>

            <!-- Data Analytics -->
            <div class="col-lg-4 col-md-6">
                <div class="text-center">
                    <div class="bg-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow-sm" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-chart-bar fa-2x text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Data Analytics</h5>
                    <p class="text-muted">
                        Transform raw data into actionable insights with advanced analytics and visualization tools.
                    </p>
                </div>
            </div>

            <!-- Cybersecurity -->
            <div class="col-lg-4 col-md-6">
                <div class="text-center">
                    <div class="bg-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow-sm" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-shield-alt fa-2x text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Cybersecurity</h5>
                    <p class="text-muted">
                        Comprehensive security solutions to protect your digital assets and ensure compliance.
                    </p>
                </div>
            </div>

            <!-- API Development -->
            <div class="col-lg-4 col-md-6">
                <div class="text-center">
                    <div class="bg-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow-sm" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-plug fa-2x text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-3">API Development</h5>
                    <p class="text-muted">
                        RESTful APIs and microservices architecture for seamless system integration and scalability.
                    </p>
                </div>
            </div>

            <!-- Quality Assurance -->
            <div class="col-lg-4 col-md-6">
                <div class="text-center">
                    <div class="bg-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow-sm" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-bug fa-2x text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Quality Assurance</h5>
                    <p class="text-muted">
                        Comprehensive testing strategies to ensure your applications are bug-free and perform optimally.
                    </p>
                </div>
            </div>

            <!-- Maintenance & Support -->
            <div class="col-lg-4 col-md-6">
                <div class="text-center">
                    <div class="bg-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow-sm" 
                         style="width: 80px; height: 80px;">
                        <i class="fas fa-wrench fa-2x text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Maintenance & Support</h5>
                    <p class="text-muted">
                        Ongoing maintenance, updates, and 24/7 support to keep your systems running smoothly.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Technology Stack -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="fw-bold mb-3">Technologies We Use</h2>
                <p class="lead text-muted">
                    We leverage cutting-edge technologies and frameworks to deliver robust, scalable solutions.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Frontend -->
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <h5 class="fw-bold mb-3">Frontend</h5>
                        <ul class="list-unstyled text-muted">
                            <li class="mb-2">React.js</li>
                            <li class="mb-2">Vue.js</li>
                            <li class="mb-2">Angular</li>
                            <li class="mb-2">TypeScript</li>
                            <li class="mb-2">Next.js</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Backend -->
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <h5 class="fw-bold mb-3">Backend</h5>
                        <ul class="list-unstyled text-muted">
                            <li class="mb-2">Laravel</li>
                            <li class="mb-2">Node.js</li>
                            <li class="mb-2">Python</li>
                            <li class="mb-2">Java Spring</li>
                            <li class="mb-2">.NET Core</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Mobile -->
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <h5 class="fw-bold mb-3">Mobile</h5>
                        <ul class="list-unstyled text-muted">
                            <li class="mb-2">React Native</li>
                            <li class="mb-2">Flutter</li>
                            <li class="mb-2">iOS (Swift)</li>
                            <li class="mb-2">Android (Kotlin)</li>
                            <li class="mb-2">Xamarin</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Cloud -->
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <h5 class="fw-bold mb-3">Cloud</h5>
                        <ul class="list-unstyled text-muted">
                            <li class="mb-2">AWS</li>
                            <li class="mb-2">Azure</li>
                            <li class="mb-2">Google Cloud</li>
                            <li class="mb-2">Docker</li>
                            <li class="mb-2">Kubernetes</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Process -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="fw-bold mb-3">Our Development Process</h2>
                <p class="lead text-muted">
                    A proven methodology that ensures successful project delivery from start to finish.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Discovery -->
            <div class="col-lg-3 col-md-6">
                <div class="text-center">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <span class="fw-bold fs-4">1</span>
                    </div>
                    <h5 class="fw-bold mb-3">Discovery</h5>
                    <p class="text-muted">
                        Understanding your business needs, goals, and technical requirements through detailed analysis.
                    </p>
                </div>
            </div>

            <!-- Planning -->
            <div class="col-lg-3 col-md-6">
                <div class="text-center">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <span class="fw-bold fs-4">2</span>
                    </div>
                    <h5 class="fw-bold mb-3">Planning</h5>
                    <p class="text-muted">
                        Creating detailed project roadmaps, timelines, and architecture design for optimal execution.
                    </p>
                </div>
            </div>

            <!-- Development -->
            <div class="col-lg-3 col-md-6">
                <div class="text-center">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <span class="fw-bold fs-4">3</span>
                    </div>
                    <h5 class="fw-bold mb-3">Development</h5>
                    <p class="text-muted">
                        Agile development with regular iterations, testing, and client feedback integration.
                    </p>
                </div>
            </div>

            <!-- Deployment -->
            <div class="col-lg-3 col-md-6">
                <div class="text-center">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                         style="width: 80px; height: 80px;">
                        <span class="fw-bold fs-4">4</span>
                    </div>
                    <h5 class="fw-bold mb-3">Deployment</h5>
                    <p class="text-muted">
                        Smooth deployment with comprehensive testing, documentation, and ongoing support.
                    </p>
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
                <h2 class="fw-bold mb-3">Ready to Start Your Project?</h2>
                <p class="lead text-muted mb-4">
                    Let's discuss how our services can help you achieve your technology goals and transform your business.
                </p>
                <div class="d-flex gap-3 justify-content-center">
                    <a href="{{ url('/contact') }}" class="btn btn-primary-custom btn-lg">
                        <i class="fas fa-phone me-2"></i>Get Free Consultation
                    </a>
                    <a href="{{ url('/about') }}" class="btn btn-outline-primary btn-lg">
                        <i class="fas fa-info-circle me-2"></i>Learn About Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection