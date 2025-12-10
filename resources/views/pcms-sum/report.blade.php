<x-layout>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebar" class="col-md-2 p-3 d-none d-md-block bg-light sidebar min-vh-100">
            <div class="position-sticky">
                <ul class="nav flex-column p-3">
                    <li class="mb-2 fw-bold">Menu</li>

                    <li class="nav-item">
                        <a class="nav-link text-black" href="{{ url()->previous() }}">
                            <i class="bi bi-arrow-left-circle me-2"></i>Back
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="col-md-10 ms-sm-auto px-4">
            <div class="container mt-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="mb-0"><i class="bi bi-file-text me-2"></i>Summary Report: {{ $start_date }} to {{ $end_date }}</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover mb-0 align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Category ID</th>
                                        <th>Total Amount</th>
                                        <th>Total Transactions</th>
                                        <th>Entry Type</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($summary as $row)
                                        <tr>
                                            <td>{{ $row->category_id }}</td>
                                            <td>{{ $row->total_amount }}</td>
                                            <td>{{ $row->total_transactions }}</td>
                                            <td>{{ $row->entry_type }}</td>
                                            <td>
                                                <span class="badge bg-info text-dark">{{ $row->status }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

</x-layout>