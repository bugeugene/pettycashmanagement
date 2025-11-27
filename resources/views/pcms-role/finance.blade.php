<x-layout>
    <h2 class="fw-bold mb-3">Finance Dashboard</h2>
    <p class="text-muted">Manage approvals, funds, logs, and summaries.</p>

    <div class="row g-3">

        <div class="col-md-4">
            <a href="{{ url('/entries') }}" class="text-decoration-none">
                <div class="card shadow p-4 text-center">
                    <i class="bi bi-plus-circle fs-1"></i>
                    <h5>View Petty Cash Request</h5>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ url('/approval') }}" class="text-decoration-none">
                <div class="card shadow p-4 text-center">
                    <i class="bi bi-check2-circle fs-1"></i>
                    <h5>Pending Approvals</h5>
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
            <a href="{{ url('/summary') }}" class="text-decoration-none">
                <div class="card shadow p-4 text-center">
                    <i class="bi bi-file-earmark-text fs-1"></i>
                    <h5>Generate Summary</h5>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ url('/audit') }}" class="text-decoration-none">
                <div class="card shadow p-4 text-center">
                    <i class="bi bi-clock-history fs-1"></i>
                    <h5>Audit Log</h5>
                </div>
            </a>
        </div>

    </div>
</x-layout>
