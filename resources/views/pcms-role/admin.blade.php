<x-layout>
    <h2 class="fw-bold mb-3">Admin Dashboard</h2>
    <p class="text-muted">Manage system users and configurations.</p>

    <div class="row g-3">

        <div class="col-md-4">
            <a href="{{ url('/users') }}" class="text-decoration-none">
                <div class="card shadow p-4 text-center">
                    <i class="bi bi-people fs-1"></i>
                    <h5>Manage Users</h5>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ url('/category') }}" class="text-decoration-none">
                <div class="card shadow p-4 text-center">
                    <i class="bi bi-folder fs-1"></i>
                    <h5>Manage Categories</h5>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ url('/funds') }}" class="text-decoration-none">
                <div class="card shadow p-4 text-center">
                    <i class="bi bi-wallet2 fs-1"></i>
                    <h5>Petty Cash Fund</h5>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ url('/approval') }}" class="text-decoration-none">
                <div class="card shadow p-4 text-center">
                    <i class="bi bi-diagram-3 fs-1"></i>
                    <h5>Configure Workflow</h5>
                </div>
            </a>
        </div>

    </div>
</x-layout>
