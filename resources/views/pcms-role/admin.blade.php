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
                            <a class="nav-link text-black" href="{{ url('/category') }}">
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
                    </ul>
                </div>
            </nav>

            <main class="col-md-10 ms-sm-auto px-4 py-4">
                <h2 class="fw-bold mb-1">Admin Dashboard</h2>
                <p class="text-muted mb-4">Overview of system activity and resources.</p>

                <div class="row g-3 mb-4">
                    <div class="col-md-3 d-flex">
                        <div class="p-3 bg-white shadow-sm rounded flex-fill h-100">
                            <p class="text-muted mb-1">Total Users</p>
                            <h3 class="fw-bold text-primary mb-0">{{ $totalUsers }}</h3>
                        </div>
                    </div>

                    <div class="col-md-3 d-flex">
                        <div class="p-3 bg-white shadow-sm rounded flex-fill h-100">
                            <p class="text-muted mb-1">Categories</p>
                            <h3 class="fw-bold text-info mb-0">{{ $totalCategories }}</h3>
                        </div>
                    </div>

                    <div class="col-md-3 d-flex">
                        <div class="p-3 bg-white shadow-sm rounded flex-fill h-100">
                            <p class="text-muted mb-1">Petty Cash Balance</p>
                            <h3 class="fw-bold text-primary mb-0">
                                {{ $fund ? '₱' . number_format($fund->current_balance, 2) : '₱0.00' }}
                            </h3>
                        </div>
                    </div>

                    <div class="col-md-3 d-flex">
                        <div class="card border-0 shadow-sm flex-fill h-100">
                            <div class="card-body">
                                <h6 class="text-muted">Recent Category Used</h6>

                                @if ($topCategory)
                                <h5 class="fw-bold">{{ $topCategory->name }}</h5>
                                <small class="text-muted">
                                    Used {{ $topCategory->usage_count }}x •
                                    ₱{{ number_format($topCategory->total_amount, 2) }}
                                </small>
                                @else
                                <h5 class="fw-bold text-muted">No Data</h5>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="mb-0 fw-bold">
                            <i class="bi bi-clock-history me-2"></i>Recent Transactions
                        </h5>
                    </div>

                    <div class="card-body p-0">
                        <table class="table table-hover table-bordered mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Purpose</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($recentTransactions as $tx)
                                <tr>
                                    <td>{{ $tx->date }}</td>
                                    <td>{{ $tx->purpose }}</td>
                                    <td>₱{{ number_format($tx->amount, 2) }}</td>
                                    <td>
                                        <span class="badge bg-success">Approved</span>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-3">
                                        No transactions found.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </main>

        </div>
    </div>

</x-layout>
