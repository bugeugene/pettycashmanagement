<x-layout>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-2 p-3 d-none d-md-block bg-light sidebar min-vh-100">
                <div class="position-sticky">
                    <ul class="nav flex-column p-3">
                        <li class="mb-2 fw-bold">Menu</li>

                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{url('/dashboard')}}">
                                <i class="bi bi-speedometer me-2"></i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{url('/entries')}}">
                                <i class="bi bi-grid me-2"></i>View Transaction
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{url('/approval')}}">
                                <i class="bi bi-check2-circle me-2"></i>Mark Remarks
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{url('/summary')}}">
                                <i class="bi bi-file-earmark-text me-2"></i>Generate Summary
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{url('/audit')}}">
                                <i class="bi bi-clock-history me-2"></i>Audit Log
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="">
                                <i class="bi bi-person-circle me-2"></i>Profile
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-10 ms-sm-auto px-4 py-4">
                <h2 class="fw-bold mb-3">Finance Dashboard</h2>
                <p class="text-muted">Manage approvals, funds, logs, and summaries.</p>
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="card shadow p-4 text-center">
                            <i class="bi bi-list-check fs-1 mb-2"></i>
                            <h5>Total Requests</h5>
                            <p class="fs-4"></p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card shadow p-4 text-center">
                            <i class="bi bi-check-circle-fill fs-1 mb-2 text-success"></i>
                            <h5>Approved</h5>
                            <p class="fs-4 text-success"></p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card shadow p-4 text-center">
                            <i class="bi bi-x-circle-fill fs-1 mb-2 text-danger"></i>
                            <h5>Rejected</h5>
                            <p class="fs-4 text-danger"></p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card shadow p-4 text-center">
                            <i class="bi bi-hourglass-split fs-1 mb-2 text-warning"></i>
                            <h5>Pending</h5>
                            <p class="fs-4 text-warning"></p>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

</x-layout>
