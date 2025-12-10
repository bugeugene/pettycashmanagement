<x-layout>

    <div class="container-fluid">
        <div class="row">

            <nav id="sidebar" class="col-md-2 p-3 d-none d-md-block bg-light sidebar min-vh-100">
                <div class="position-sticky">
                    <ul class="nav flex-column p-3">
                        <li class="nav-item">
                        <li class="mb-2 fw-bold">Menu</li>

                        <a class="nav-link text-black" href="{{ url('/dashboard') }}">
                            <i class="bi bi-speedometer me-2"></i>Dashboard
                        </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-10 ms-sm-auto px-4 py-4">

                <div class="d-flex justify-content-center align-items-center">
                    <div class="p-4 border rounded bg-light shadow">

                        <h2 class="mb-4 text-primary d-flex align-items-center">
                            <i class="bi bi-cash-coin me-2"></i>Edit Petty Cash Entry
                        </h2>

                        <form action="{{ url('/entries/'.$entry->entry_id.'/update') }}" method="POST">
                            @csrf

                            <div class="row g-4">

                                <div class="col-12">
                                    <label class="form-label fw-semibold">
                                        <i class="bi bi-pencil-square me-2"></i> Purpose
                                    </label>
                                    <textarea name="purpose" class="form-control" rows="3">{{ $entry->purpose }}</textarea>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        <i class="bi bi-currency-dollar me-2"></i>Amount
                                    </label>
                                    <input type="number" name="amount" class="form-control" value="{{ $entry->amount }}" step="0.01" min="0" max="99999999.99">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        <i class="bi bi-calendar-date me-2"></i>Date
                                    </label>
                                    <input type="date" name="date" class="form-control" value="{{ $entry->date }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        <i class="bi bi-menu-button-wide me-2"></i>Entry Type
                                    </label>
                                    <select name="entry_type" class="form-select">
                                        <option value="Request" {{ $entry->entry_type == 'Request' ? 'selected' : '' }}>Request</option>
                                        <option value="Replenishment" {{ $entry->entry_type == 'Replenishment' ? 'selected' : '' }}>Replenishment</option>
                                        <option value="Adjustment" {{ $entry->entry_type == 'Adjustment' ? 'selected' : '' }}>Adjustment</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">
                                        <i class="bi bi-flag me-2"></i>Status
                                    </label>
                                    <select name="status" class="form-select">
                                        <option value="Pending" {{ $entry->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="Rejected" {{ $entry->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                                        <option value="Approved" {{ $entry->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                                    </select>
                                </div>

                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ url('/entries') }}" class="btn btn-outline-primary">
                                    <i class="bi bi-arrow-left me-2"></i>Cancel
                                </a>
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-check-circle me-2"></i>Update Entry
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

            </main>
        </div>
    </div>

</x-layout>
