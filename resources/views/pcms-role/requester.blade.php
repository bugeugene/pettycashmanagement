<x-layout>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-2 p-3 d-none d-md-block bg-light sidebar min-vh-100">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li>
                            <h5 class="mb-3 fw-bold">Menu</h5>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link text-black" href="{{ url('/dashboard') }}">
                                <i class="bi bi-speedometer2 me-2"></i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link text-black" href="{{ url('/entries/add') }}">
                                <i class="bi bi-plus-circle me-2"></i>Create Request
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link text-black" href="{{ url('/category') }}">
                                <i class="bi bi-people me-2"></i>View Categories
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link text-black" href="{{ url('/entries') }}">
                                <i class="bi bi-list-ul me-2"></i>View History
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-10 ms-sm-auto px-4 py-4">
                <h2 class="fw-bold mb-2">Requester Dashboard</h2>
                <p class="text-muted mb-4">Here’s a quick summary of your petty cash activity.</p>

                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <div class="card shadow-sm p-3 text-center">
                            <h6 class="text-muted">Total Requests</h6>
                            <h3 class="fw-bold">{{ $totalRequests }}</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm p-3 text-center">
                            <h6 class="text-muted">Pending</h6>
                            <h3 class="fw-bold text-warning">{{ $pending }}</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm p-3 text-center">
                            <h6 class="text-muted">Approved</h6>
                            <h3 class="fw-bold text-success">{{ $approved }}</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm p-3 text-center">
                            <h6 class="text-muted">Rejected</h6>
                            <h3 class="fw-bold text-danger">{{ $rejected }}</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm p-3 text-center">
                            <h6 class="text-muted">Categories</h6>
                            <h3 class="fw-bold text-info">{{ $totalCategories }}</h3>
                        </div>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-3">
                        <div class="card shadow-sm p-3 text-center">
                            <h6 class="text-muted">Total Amount Requested</h6>
                            <h3 class="fw-bold">₱{{ number_format($totalRequestAmount, 2) }}</h3>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow-sm p-3 text-center">
                            <h6 class="text-muted">Total Replenished</h6>
                            <h3 class="fw-bold">₱{{ number_format($totalReplenishment, 2) }}</h3>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow-sm p-3 text-center">
                            <h6 class="text-muted">Total Adjusted</h6>
                            <h3 class="fw-bold">₱{{ number_format($totalAdjust, 2) }}</h3>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow-sm p-3 text-center">
                            <h6 class="text-muted">Most Used Category</h6>
                            <h3 class="fw-bold">{{ $topCategory->name ?? 'No Data' }}</h3>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="card shadow-sm">
                        <div class="card-header bg-white">
                            <h5 class="fw-bold mb-0">
                                <i class="bi bi-clock-history me-2"></i>Recent Requests
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Date</th>
                                        <th>Purpose</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recentEntries as $entry)
                                    <tr>
                                        <td>{{ $entry->date }}</td>
                                        <td>{{ $entry->purpose }}</td>
                                        <td>₱{{ number_format($entry->amount, 2) }}</td>
                                        <td>{{ $entry->status }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

</x-layout>
