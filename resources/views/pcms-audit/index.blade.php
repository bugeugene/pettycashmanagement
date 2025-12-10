<x-layout>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebar" class="col-md-2 shadow-lg rounded p-3 d-none d-md-block bg-white sidebar min-vh-100">
            <div class="position-sticky">
                <ul class="nav flex-column p-3">
                    <li class="mb-2 fw-bold">Menu</li>

                    <li class="nav-item">
                        <a class="nav-link text-black" href="{{ url()->previous() }}">
                            <i class="bi bi-arrow-left-circle"></i> Back
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="col-md-10 ms-sm-auto px-4">
            <div class="container mt-2">
                <div class="card border-0">
                    <div class="card-header bg-white">
                        <h4 class="mb-0"><i class="bi bi-clipboard-check me-2"></i> Audit Logs</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive" style="max-height: 480px; overflow-y: auto;">
                            <table class="table table-striped table-hover mb-0 align-middle">
                                <thead class="table-light sticky-top">
                                    <tr>
                                        <th>Timestamp</th>
                                        <th>User</th>
                                        <th>Entry ID</th>
                                        <th>Action</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($logs as $log)
                                        <tr class="shadow-sm">
                                            <td>{{ $log->time_stamp }}</td>
                                            <td>{{ $log->user_name }}</td>
                                            <td>{{ $log->entry_id }}</td>
                                            <td>
                                                <span class="badge text-dark">{{ $log->action_type }}</span>
                                            </td>
                                            <td>{{ $log->details }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer text-end bg-light">
                            <small class="text-muted">
                                Showing {{ count($logs) }} log entries
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

</x-layout>