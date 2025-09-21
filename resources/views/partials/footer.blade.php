<footer class="footer-bg text-light py-5 mt-5">
    <div class="container">
        <div class="row">
            <!-- Company Info -->
            <div class="col-lg-4 col-md-6 mb-4">
                <h5 class="fw-bold mb-3">
                    <i class="fas fa-code-branch me-2"></i>TechCorp
                </h5>
                <p class="text-light">
                    Leading technology solutions provider, delivering innovative software development, 
                    digital transformation, and IT consulting services to businesses worldwide.
                </p>
                <div class="social-links">
                    <a href="#" class="text-light me-3" title="Facebook">
                        <i class="fab fa-facebook-f fa-lg"></i>
                    </a>
                    <a href="#" class="text-light me-3" title="Twitter">
                        <i class="fab fa-twitter fa-lg"></i>
                    </a>
                    <a href="#" class="text-light me-3" title="LinkedIn">
                        <i class="fab fa-linkedin-in fa-lg"></i>
                    </a>
                    <a href="#" class="text-light me-3" title="GitHub">
                        <i class="fab fa-github fa-lg"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h6 class="fw-bold mb-3">Quick Links</h6>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="{{ url('/') }}" class="text-light text-decoration-none">
                            <i class="fas fa-angle-right me-1"></i>Home
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ url('/about') }}" class="text-light text-decoration-none">
                            <i class="fas fa-angle-right me-1"></i>About Us
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ url('/services') }}" class="text-light text-decoration-none">
                            <i class="fas fa-angle-right me-1"></i>Services
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ url('/contact') }}" class="text-light text-decoration-none">
                            <i class="fas fa-angle-right me-1"></i>Contact
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Services -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h6 class="fw-bold mb-3">Our Services</h6>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <span class="text-light">
                            <i class="fas fa-check me-2 text-primary"></i>Web Development
                        </span>
                    </li>
                    <li class="mb-2">
                        <span class="text-light">
                            <i class="fas fa-check me-2 text-primary"></i>Mobile Applications
                        </span>
                    </li>
                    <li class="mb-2">
                        <span class="text-light">
                            <i class="fas fa-check me-2 text-primary"></i>Cloud Solutions
                        </span>
                    </li>
                    <li class="mb-2">
                        <span class="text-light">
                            <i class="fas fa-check me-2 text-primary"></i>IT Consulting
                        </span>
                    </li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h6 class="fw-bold mb-3">Contact Info</h6>
                <ul class="list-unstyled">
                    <li class="mb-2 text-light">
                        <i class="fas fa-map-marker-alt me-2 text-primary"></i>
                        123 Tech Street, Innovation City, TC 12345
                    </li>
                    <li class="mb-2 text-light">
                        <i class="fas fa-phone me-2 text-primary"></i>
                        +1 (555) 123-4567
                    </li>
                    <li class="mb-2 text-light">
                        <i class="fas fa-envelope me-2 text-primary"></i>
                        info@techcorp.com
                    </li>
                    <li class="mb-2 text-light">
                        <i class="fas fa-clock me-2 text-primary"></i>
                        Mon - Fri: 9:00 AM - 6:00 PM
                    </li>
                </ul>
            </div>
        </div>

        <hr class="my-4 border-secondary">

        <!-- Copyright -->
        <div class="row">
            <div class="col-md-6">
                <p class="mb-0 text-light">
                    &copy; {{ date('Y') }} TechCorp. All rights reserved.
                </p>
            </div>
            <div class="col-md-6 text-md-end">
                <p class="mb-0 text-light">
                    Built with <i class="fas fa-heart text-danger"></i> using Laravel
                </p>
            </div>
        </div>
    </div>
</footer>