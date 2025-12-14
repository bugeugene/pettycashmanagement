<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Petty Cash Management System</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-info bg-gradient shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center gap-2" href="/">
                    <i class="bi bi-bank2"></i>
                    <span class="fw-bold">Petty Cash Management</span>
                </a>

                <div class="d-flex align-items-center gap-2">
                    <ul class="navbar-nav align-items-center gap-3 ms-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#services">
                                <i class="bi bi-briefcase-fill me-1"></i> Our Service
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="#reviews">
                                <i class="bi bi-star-fill me-1"></i> Reviews
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="#contact">
                                <i class="bi bi-envelope-fill me-1"></i> Contact Us
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="#about">
                                <i class="bi bi-info-circle-fill me-1"></i> About Us
                            </a>
                        </li>

                        @guest
                        <li class="nav-item ms-2">
                            <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">
                                Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="btn btn-light btn-sm">
                                Register
                            </a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>

        <section class="bg-light min-vh-75 d-flex align-items-center">
            <div class="container py-5">
                <div class="row align-items-center g-5">
                    <div class="col-md-7">
                        <h1 class="fw-bold display-5 mb-3">
                            <i class="bi bi-buildings-fill text-info me-2"></i>
                            Welcome to CeauTech Solutions
                        </h1>

                        <p class="lead text-muted mb-4">
                            A trusted technology consulting firm delivering secure, efficient,
                            and reliable systems for small and medium-sized businesses.
                        </p>

                        <div class="d-flex gap-4 mb-4">
                            <div>
                                <i class="bi bi-shield-lock-fill text-info fs-4"></i>
                                <p class="small fw-semibold mb-0">Secure System</p>
                            </div>
                            <div>
                                <i class="bi bi-lightning-fill text-info fs-4"></i>
                                <p class="small fw-semibold mb-0">Fast Process</p>
                            </div>
                            <div>
                                <i class="bi bi-patch-check-fill text-info fs-4"></i>
                                <p class="small fw-semibold mb-0">Reliable</p>
                            </div>
                        </div>

                        <div class="d-flex gap-3">
                            <a href="{{ url('/login') }}" class="btn btn-info btn-lg text-white">
                                <i class="bi bi-box-arrow-in-right"></i> Get Started
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="bg-white py-5" id="services">
            <div class="container">
                <h2 class="text-center fw-bold mb-4">
                    <i class="bi bi-stars text-info me-2"></i>Key Features
                </h2>

                <div class="row text-center g-4">
                    <div class="col-md-4">
                        <i class="bi bi-cash-coin fs-1 text-info"></i>
                        <h5 class="mt-3">Expense Tracking</h5>
                        <p class="text-muted">Record and monitor petty cash expenses easily.</p>
                    </div>

                    <div class="col-md-4">
                        <i class="bi bi-check2-circle fs-1 text-info"></i>
                        <h5 class="mt-3">Approval Workflow</h5>
                        <p class="text-muted">Structured approval process for accountability.</p>
                    </div>

                    <div class="col-md-4">
                        <i class="bi bi-graph-up-arrow fs-1 text-info"></i>
                        <h5 class="mt-3">Reports & Summary</h5>
                        <p class="text-muted">Generate summaries and audit-ready reports.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-light py-5" id="reviews">
            <div class="container">
                <h2 class="text-center fw-bold mb-4">
                    <i class="bi bi-star-fill text-warning me-2"></i>Reviews
                </h2>
                <p class="text-center mb-5">
                    <i class="bi bi-chat-square-quote me-2"></i> Feedback from users who have experienced the Petty Cash Management System.
                </p>

                <div class="row g-4 justify-content-center">
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm text-center">
                            <img src="{{ asset('image/maria.jpg') }}" class="card-img-top" alt="User Review Image" style="height: 220px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">Maria L. Santos</h5>
                                <small class="text-muted">Finance</small>
                                <p class="card-text">
                                    “The system made tracking petty cash expenses easier and more organized.
                                    It significantly reduced manual recording errors.”
                                </p>
                                <div class="mb-2 text-warning">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm text-center">
                            <img src="{{ asset('image/jonathan.jpg') }}" class="card-img-top" alt="User Review Image" style="height: 220px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">Jonathan R. Cruz</h5>
                                <small class="text-muted">Requester</small>
                                <p class="card-text">
                                    “Submitting petty cash requests is now quick and straightforward.
                                    The system keeps my requests organized and lets me easily track their status,
                                    making the process more convenient and reliable.”
                                </p>
                                <div class="mb-2 text-warning">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm text-center">
                            <img src="{{ asset('image/kevin.jpg') }}" class="card-img-top" alt="User Review Image" style="height: 220px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">Kevin A. Dela Rosa</h5>
                                <small class="text-muted">System Administrator</small>
                                <p class="card-text">
                                    “Generating reports and summaries is fast and reliable.
                                    The system supports auditing and decision-making.”
                                </p>
                                <div class="mb-2 text-warning">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section id="contact" class="py-5" style="background:#f4f8fc;">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">
                        <i class="bi bi-headset text-info me-2"></i>Contact Us
                    </h2>
                    <p class="text-muted small">
                        For system support, account assistance, and petty cash inquiries.
                    </p>
                </div>

                <div class="row g-4 align-items-center">
                    <div class="col-md-6 d-flex flex-column justify-content-center align-items-center text-center">
                        <h4 class="fw-bold mb-3"><i class="bi bi-chat-dots-fill"></i> Get in Touch</h4>
                        <p class="text-muted">
                            Our support team is ready to assist you with system-related concerns,
                            petty cash transactions, and account management questions.
                            Feel free to reach out using the contact details below.
                        </p>

                        <div class="mt-3">
                            <p><strong><i class="bi bi-envelope-fill"></i> Email:</strong> support@pettycashsystem.com</p>
                            <p><strong><i class="bi bi-telephone-fill"></i> Phone:</strong> +63 453 2226 008</p>
                            <p><strong><i class="bi bi-geo-alt-fill"></i> Office:</strong> CeauTech Solutions, Philippines</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <form class="p-4 bg-white shadow-sm rounded">

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Full Name</label>
                                <input type="text" class="form-control" placeholder="John Doe">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold"> Email Address</label>
                                <input type="email" class="form-control" placeholder="johndoe@gmail.com">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Message</label>
                                <textarea class="form-control" rows="4" placeholder="How can we help you?"></textarea>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary py-2 fw-semibold">
                                    <i class="bi bi-send-fill"></i> Send Message
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-5" id="about">
            <div class="container">
                <h2 class="text-center fw-bold mb-4">
                    <i class="bi bi-info-circle-fill text-info"></i> About the System
                </h2>
                <p class="text-center">
                    The Petty Cash Management System is designed to help organizations
                    efficiently monitor cash disbursements, track expenses, and
                    maintain accurate financial records. It reduces manual errors
                    and improves accountability through a structured workflow.
                </p>
            </div>
        </section>
    </main>
    <footer class="bg-info bg-gradient text-light text-center py-4 mt-auto">
        <div class="container">
            &copy; {{ date('Y') }} Petty Cash Management System. All Rights Reserved.
        </div>
    </footer>
</body>
</html>
