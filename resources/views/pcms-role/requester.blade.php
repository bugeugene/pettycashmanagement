<x-layout>
    <div class="container-fluid">
    <div class="row">

        <nav id="sidebar" class="col-md-2 shadow-lg rounded p-3 d-none d-md-block bg-white sidebar min-vh-100">
            <div class="position-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a class="nav-link text-black" href="{{ url('/dashboard') }}">
                            <i class="bi bi-speedometer2 me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link text-black" href="{{ url('/entries/add') }}">
                            <i class="bi bi-plus-circle me-2"></i> Create Petty Cash Transaction
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link text-black" href="{{ url('/categories') }}">
                            <i class="bi bi-people me-2"></i> View Categories
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link text-black" href="{{ url('/entries') }}">
                            <i class="bi bi-list-ul me-2"></i> View Petty Cash Transaction History
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link text-black" href="">
                            <i class="bi bi-person-circle me-2"></i> Profile
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="col-md-10 ms-sm-auto px-4 py-4">
            <h2 class="fw-bold mb-3">Requester Dashboard</h2>
            <p class="text-muted mb-4">You can create and manage your petty cash requests.</p>

            <!-- Add your main content here -->
            <div class="row">
                <!-- Example card -->
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm p-3 text-center">
                        <i class="bi bi-plus-circle fs-1 mb-2 text-primary"></i>
                        <h5>Create Request</h5>
                        <a href="{{ url('/entries/add') }}" class="btn btn-primary btn-sm mt-2">New Entry</a>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm p-3 text-center">
                        <i class="bi bi-list-ul fs-1 mb-2 text-success"></i>
                        <h5>View History</h5>
                        <a href="{{ url('/entries') }}" class="btn btn-success btn-sm mt-2">View</a>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm p-3 text-center">
                        <i class="bi bi-people fs-1 mb-2 text-info"></i>
                        <h5>Categories</h5>
                        <a href="{{ url('/categories') }}" class="btn btn-info btn-sm mt-2">View</a>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

</x-layout>
