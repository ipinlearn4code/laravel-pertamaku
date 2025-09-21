@extends('layouts.app')

@section('title', 'Contact Us - TechCorp')

@section('content')
<!-- Page Header -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-4">Contact Us</h1>
                <p class="lead">
                    Get in touch with our team to discuss your project and discover how we can help your business grow.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form & Info -->
<section class="py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Contact Form -->
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <h3 class="fw-bold mb-4">Send us a Message</h3>
                        <p class="text-muted mb-4">
                            Fill out the form below and we'll get back to you within 24 hours.
                        </p>

                        <form action="#" method="POST" class="needs-validation" novalidate>
                            @csrf
                            <div class="row g-3">
                                <!-- Name Fields -->
                                <div class="col-md-6">
                                    <label for="first_name" class="form-label">First Name *</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                                    <div class="invalid-feedback">
                                        Please provide your first name.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="last_name" class="form-label">Last Name *</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                                    <div class="invalid-feedback">
                                        Please provide your last name.
                                    </div>
                                </div>

                                <!-- Contact Fields -->
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid email address.
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" name="phone">
                                </div>

                                <!-- Company & Service -->
                                <div class="col-md-6">
                                    <label for="company" class="form-label">Company Name</label>
                                    <input type="text" class="form-control" id="company" name="company">
                                </div>
                                <div class="col-md-6">
                                    <label for="service" class="form-label">Service of Interest</label>
                                    <select class="form-select" id="service" name="service">
                                        <option value="">Select a service</option>
                                        <option value="web-development">Web Development</option>
                                        <option value="mobile-apps">Mobile Applications</option>
                                        <option value="cloud-solutions">Cloud Solutions</option>
                                        <option value="it-consulting">IT Consulting</option>
                                        <option value="ui-ux-design">UI/UX Design</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>

                                <!-- Budget -->
                                <div class="col-12">
                                    <label for="budget" class="form-label">Project Budget</label>
                                    <select class="form-select" id="budget" name="budget">
                                        <option value="">Select budget range</option>
                                        <option value="under-10k">Under $10,000</option>
                                        <option value="10k-25k">$10,000 - $25,000</option>
                                        <option value="25k-50k">$25,000 - $50,000</option>
                                        <option value="50k-100k">$50,000 - $100,000</option>
                                        <option value="over-100k">Over $100,000</option>
                                    </select>
                                </div>

                                <!-- Message -->
                                <div class="col-12">
                                    <label for="message" class="form-label">Project Description *</label>
                                    <textarea class="form-control" id="message" name="message" rows="5" 
                                              placeholder="Tell us about your project, requirements, timeline, and any specific goals you'd like to achieve..." required></textarea>
                                    <div class="invalid-feedback">
                                        Please provide details about your project.
                                    </div>
                                </div>

                                <!-- Newsletter -->
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="newsletter" name="newsletter" value="1">
                                        <label class="form-check-label" for="newsletter">
                                            Subscribe to our newsletter for technology insights and updates
                                        </label>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary-custom btn-lg w-100">
                                        <i class="fas fa-paper-plane me-2"></i>Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="col-lg-5">
                <!-- Contact Details -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-4">Get in Touch</h4>
                        
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 50px; height: 50px;">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Address</h6>
                                <p class="text-muted mb-0">123 Tech Street<br>Innovation City, TC 12345</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 50px; height: 50px;">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Phone</h6>
                                <p class="text-muted mb-0">+1 (555) 123-4567</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 50px; height: 50px;">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Email</h6>
                                <p class="text-muted mb-0">info@techcorp.com</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" 
                                 style="width: 50px; height: 50px;">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Business Hours</h6>
                                <p class="text-muted mb-0">Mon - Fri: 9:00 AM - 6:00 PM<br>Sat: 10:00 AM - 2:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Response Time -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 text-center">
                        <div class="text-primary mb-3">
                            <i class="fas fa-clock fa-3x"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Quick Response</h5>
                        <p class="text-muted mb-0">
                            We typically respond to all inquiries within 24 hours during business days.
                        </p>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <h5 class="fw-bold mb-3">Follow Us</h5>
                        <div class="d-flex justify-content-center gap-3">
                            <a href="#" class="btn btn-outline-primary btn-sm rounded-circle" style="width: 40px; height: 40px;">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="btn btn-outline-primary btn-sm rounded-circle" style="width: 40px; height: 40px;">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="btn btn-outline-primary btn-sm rounded-circle" style="width: 40px; height: 40px;">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="btn btn-outline-primary btn-sm rounded-circle" style="width: 40px; height: 40px;">
                                <i class="fab fa-github"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="fw-bold mb-3">Visit Our Office</h2>
                <p class="lead text-muted">
                    We'd love to meet you in person! Schedule a visit to our office for a face-to-face consultation.
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-0">
                        <!-- Placeholder for map - You would integrate with Google Maps or similar -->
                        <div class="bg-light d-flex align-items-center justify-content-center" style="height: 400px;">
                            <div class="text-center">
                                <i class="fas fa-map-marked-alt fa-4x text-primary mb-3"></i>
                                <h5 class="fw-bold">Interactive Map</h5>
                                <p class="text-muted mb-3">123 Tech Street, Innovation City, TC 12345</p>
                                <a href="https://maps.google.com" target="_blank" class="btn btn-primary">
                                    <i class="fas fa-external-link-alt me-2"></i>View on Google Maps
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="fw-bold mb-3">Frequently Asked Questions</h2>
                <p class="lead text-muted">
                    Quick answers to common questions about our services and processes.
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="accordion" id="faqAccordion">
                    <!-- FAQ 1 -->
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header" id="faq1">
                            <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" 
                                    data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                How long does a typical project take?
                            </button>
                        </h2>
                        <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="faq1" 
                             data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                Project timelines vary depending on scope and complexity. Simple websites typically take 4-6 weeks, 
                                while complex applications can take 3-6 months or more. We'll provide a detailed timeline during our initial consultation.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header" id="faq2">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" 
                                    data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                Do you provide ongoing support and maintenance?
                            </button>
                        </h2>
                        <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="faq2" 
                             data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                Yes! We offer comprehensive maintenance and support packages including regular updates, 
                                security patches, backup management, and 24/7 technical support to keep your systems running smoothly.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header" id="faq3">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" 
                                    data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                What technologies do you specialize in?
                            </button>
                        </h2>
                        <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="faq3" 
                             data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                We specialize in modern web technologies including React, Vue.js, Laravel, Node.js, Python, 
                                mobile development with React Native and Flutter, and cloud platforms like AWS and Azure.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="accordion-item border-0 shadow-sm">
                        <h2 class="accordion-header" id="faq4">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" 
                                    data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                Can you work with our existing team?
                            </button>
                        </h2>
                        <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="faq4" 
                             data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                Absolutely! We frequently collaborate with in-house teams, providing additional expertise, 
                                resources, or specialized skills to help you achieve your project goals more effectively.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
// Form validation
(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
</script>
@endpush