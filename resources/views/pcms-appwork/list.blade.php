<x-layout>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-2 p-3 d-none d-md-block bg-light sidebar min-vh-100">
                <div class="position-sticky">
                    <ul class="nav flex-column p-3">
                        <li class="mb-2 fw-bold">Menu</li>

                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ url('/dashboard') }}">
                                <i class="bi bi-speedometer me-2"></i> Dashboard
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-10 ms-sm-auto px-4">

                <div class="container mt-2">
                    <div class="card border-0">
                        <div class="card-header bg-white">
                            <h4 class="mb-0"><i class="bi bi-file-text me-2"></i>Approvals Remarks</h4>
                        </div>

                        @if (empty($statuslist))
                        <p class="text-center mt-3">No entries pending approval.</p>
                        @else
                        <div class="card-body p-0">
                            <div class="table-responsive" style="max-height: 480px; overflow-y: auto;">
                                <table class="table table-bordered table-striped table-hover mb-0 align-middle">
                                    <thead class="thead-dark sticky-top">
                                        <tr>
                                            <th>Entry ID</th>
                                            <th>Amount</th>
                                            <th>Purpose</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($statuslist as $sl)
                                        <tr>
                                            <td>{{ $sl->entry_id }}</td>
                                            <td>{{ $sl->amount }}</td>
                                            <td>{{ $sl->purpose }}</td>
                                            <td>
                                                <span class="badge 
                                                        @if($sl->status == 'Approved') bg-success
                                                        @elseif($sl->status == 'Pending') bg-warning
                                                        @elseif($sl->status == 'Rejected') bg-danger
                                                        @else bg-secondary
                                                        @endif">
                                                    {{ $sl->status }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ url('/approval/remark/' . $sl->entry_id) }}" class="btn btn-primary btn-sm">
                                                    <i class="bi bi-eye me-2"></i>Review
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </main>
        </div>
    </div>

</x-layout>
