<x-layout>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-2 shadow-lg rounded p-3 d-none d-md-block bg-white sidebar min-vh-100">
                <div class="position-sticky">
                    <ul class="nav flex-column p-3">
                        <li class="mb-2 fw-bold">Menu</li>

                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{url('/dashboard')}}">
                                <i class="bi bi-speedometer me-2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{url('/entries')}}">
                                <i class="bi bi-grid me-2"></i> View Transaction
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{url('/approval')}}">
                                <i class="bi bi-check2-circle me-2"></i> Mark Remarks
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{url('/summary')}}">
                                <i class="bi bi-file-earmark-text me-2"></i> Generate Summary
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{url('/audit')}}">
                                <i class="bi bi-clock-history me-2"></i> Audit Log
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="">
                                <i class="bi bi-person-circle me-2"></i> Profile
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-10 ms-sm-auto px-4">
                <h2 class="fw-bold mb-3">Finance Dashboard</h2>
                <p class="text-muted">Manage approvals, funds, logs, and summaries.</p>
                <!-- Add your other main content here -->

                <div class="row g-3">
                    <!-- Total Requests -->
                    <div class="col-md-4">
                        <div class="card shadow p-4 text-center">
                            <i class="bi bi-list-check fs-1 mb-2"></i> <!-- represents list of requests -->
                            <h5>Total Requests</h5>
                            <p class="fs-4"></p>
                        </div>
                    </div>

                    <!-- Approved -->
                    <div class="col-md-4">
                        <div class="card shadow p-4 text-center">
                            <i class="bi bi-check-circle-fill fs-1 mb-2 text-success"></i> <!-- approved -->
                            <h5>Approved</h5>
                            <p class="fs-4 text-success"></p>
                        </div>
                    </div>

                    <!-- Rejected -->
                    <div class="col-md-4">
                        <div class="card shadow p-4 text-center">
                            <i class="bi bi-x-circle-fill fs-1 mb-2 text-danger"></i> <!-- rejected -->
                            <h5>Rejected</h5>
                            <p class="fs-4 text-danger"></p>
                        </div>
                    </div>

                    <!-- Pending -->
                    <div class="col-md-4">
                        <div class="card shadow p-4 text-center">
                            <i class="bi bi-hourglass-split fs-1 mb-2 text-warning"></i> <!-- pending -->
                            <h5>Pending</h5>
                            <p class="fs-4 text-warning"></p>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>
</x-layout>
