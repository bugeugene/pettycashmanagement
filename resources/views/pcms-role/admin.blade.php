<x-layout>

    <div class="container-fluid">
        <div class="row">

            <nav id="sidebar" class="col-md-2 p-3 d-none d-md-block bg-light sidebar min-vh-100">
                <div class="position-sticky">
                    <ul class="nav flex-column p-3">
                        <li class="mb-2 fw-bold">Menu</li>

                        <li class="nav-item mb-2">
                            <a class="nav-link text-black" href="{{ url('/dashboard') }}">
                                <i class="bi bi-speedometer me-2"></i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link text-black" href="{{ url('/users') }}">
                                <i class="bi bi-people me-2"></i>Manage Users
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link text-black" href="{{ url('/categories') }}">
                                <i class="bi bi-folder me-2"></i>Manage Categories
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link text-black" href="{{ url('/funds') }}">
                                <i class="bi bi-wallet2 me-2"></i>Manage Funds
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link text-black" href="{{ url('/approval') }}">
                                <i class="bi bi-diagram-3 me-2"></i>Configure Workflow
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link text-black" href="">
                                <i class="bi bi-person-circle me-2"></i>Profile
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-10 ms-sm-auto px-4 py-4">
                <h2 class="fw-bold mb-3">Admin Dashboard</h2>
                <p class="text-muted mb-4">Manage system users, categories, funds, and workflow configurations.</p>

                <div class="row g-4">
                    <div class="col-md-4 col-sm-6">
                        <a href="{{ url('/users') }}" class="text-decoration-none">
                            <div class="card shadow p-4 text-center h-100">
                                <i class="bi bi-people fs-1 mb-2"></i>
                                <h5>Manage Users</h5>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <a href="{{ url('/categories') }}" class="text-decoration-none">
                            <div class="card shadow p-4 text-center h-100">
                                <i class="bi bi-folder fs-1 mb-2"></i>
                                <h5>Manage Categories</h5>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <a href="{{ url('/funds') }}" class="text-decoration-none">
                            <div class="card shadow p-4 text-center h-100">
                                <i class="bi bi-wallet2 fs-1 mb-2"></i>
                                <h5>Petty Cash Fund</h5>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <a href="{{ url('/approval') }}" class="text-decoration-none">
                            <div class="card shadow p-4 text-center h-100">
                                <i class="bi bi-diagram-3 fs-1 mb-2"></i>
                                <h5>Configure Workflow</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </main>
        </div>
    </div>

</x-layout>
