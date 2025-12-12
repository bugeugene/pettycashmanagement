<x-layout>

    <div class="container-fluid">
        <div class="row">

            <nav id="sidebar" class="col-md-2 p-3 d-none d-md-block bg-light sidebar min-vh-100">
                <div class="position-sticky">
                    <ul class="nav flex-column p-3">
                        <li class="mb-2 fw-bold">Menu</li>

                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ url('/dashboard') }}">
                                <i class="bi bi-speedometer me-2"></i>Dashboard
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ url('/entries') }}">
                                <i class="bi bi-grid me-2"></i>View Transaction
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ url('/approval') }}">
                                <i class="bi bi-check2-circle me-2"></i>Mark Remarks
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ url('/summary') }}">
                                <i class="bi bi-file-earmark-text me-2"></i>Generate Summary
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ url('/audit') }}">
                                <i class="bi bi-clock-history me-2"></i>Audit Log
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-10 ms-sm-auto px-4 py-4">

                <h2 class="fw-bold mb-3">Finance Dashboard</h2>
                <p class="text-muted">Summary of fund movement & approvals.</p>

                <div class="row g-3 mb-4">

                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h6 class="text-muted">Pending Requests</h6>
                                <h3 class="fw-bold">{{ $pending }}</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h6 class="text-muted">Total Approved Amount</h6>
                                <h3 class="fw-bold text-success">₱{{ number_format($approvedAmount, 2) }}</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h6 class="text-muted">Total Rejected Amount</h6>
                                <h3 class="fw-bold text-danger">₱{{ number_format($rejectedAmount, 2) }}</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h6 class="text-muted">Petty Cash Balance</h6>
                                <h3 class="fw-bold text-primary">₱{{ number_format($currentBalance, 2) }}</h3>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-3 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h6 class="text-muted">Top Category</h6>

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
                                @foreach ($recentEntries as $re)
                                    <tr>
                                        <td>{{ $re->date }}</td>
                                        <td>{{ $re->purpose }}</td>
                                        <td>₱{{ number_format($re->amount, 2) }}</td>
                                        <td>
                                            <span class="badge 
                                                @if($re->status == 'Approved') bg-success
                                                @elseif($re->status == 'Pending') bg-warning
                                                @elseif($re->status == 'Rejected') bg-danger
                                                @endif">
                                                {{ $re->status }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </main>
        </div>
    </div>

</x-layout>
