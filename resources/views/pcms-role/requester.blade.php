<x-layout>
    <h2 class="fw-bold mb-3">Requester Dashboard</h2>
    <p class="text-muted">You can create and manage your petty cash requests.</p>

    <div class="row g-3">

        <div class="col-md-4">
            <a href="{{ url('/entries/add') }}" class="text-decoration-none">
                <div class="card shadow p-4 text-center">
                    <i class="bi bi-plus-circle fs-1"></i>
                    <h5>Create Petty Cash Request</h5>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ url('/entries') }}" class="text-decoration-none">
                <div class="card shadow p-4 text-center">
                    <i class="bi bi-list-ul fs-1"></i>
                    <h5>My Request History</h5>
                </div>
            </a>
        </div>

    </div>
</x-layout>
