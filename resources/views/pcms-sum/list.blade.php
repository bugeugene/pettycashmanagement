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

        <main class="col-md-10 ms-sm-auto px-4 d-flex justify-content-center align-items-start">
            <div class="container py-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0"><i class="bi bi-file-text"></i> Petty Cash Summary Report</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/summary') }}" method="post">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Start Date</label>
                                    <input type="date" name="start_date" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">End Date</label>
                                    <input type="date" name="end_date" class="form-control" required>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn btn-primary">
                                    <i class="bi bi-file-earmark-text"></i> Generate Summary
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

</x-layout>