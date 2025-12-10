<x-layout>

    <div class="container-fluid">
        <div class="row">

            <nav id="sidebar" class="col-md-2 shadow-lg rounded p-3 d-none d-md-block bg-light sidebar min-vh-100">
                <div class="position-sticky">
                    <ul class="nav flex-column p-3">
                        <li class="mb-2 fw-bold">Menu</li>

                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ url()->previous() }}">
                                <i class="bi bi-arrow-left-circle me-2"></i> Back
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-10 ms-sm-auto px-4 d-flex justify-content-center py-4">
                <div>
                    <div class="p-4 border rounded-3 bg-white">

                        <h3 class="mb-4 text-center">Petty Cash Entry</h3>

                        <form action="{{ url('/entries/create') }}" method="POST">
                            @csrf
                            <div class="row g-3">

                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Category</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-list-check"></i></span>
                                        <select name="category_id" required class="form-select">
                                            <option value="">-- Select Category --</option>
                                            @foreach($categories as $cat)
                                            <option value="{{ $cat->category_id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Entry Type</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-journal-check"></i></span>
                                        <select name="entry_type" required class="form-select">
                                            <option value="">Select your entry</option>
                                            <option value="Request">Request</option>
                                            <option value="Replenishment">Replenishment</option>
                                            <option value="Adjustment">Adjustment</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Amount</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-currency-dollar"></i></span>
                                        <input type="number" name="amount" step="0.01" min="0" max="99999999.99" class="form-control" placeholder="Enter amount" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Date</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                                        <input type="date" name="date" required class="form-control">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-bold">Purpose</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-pencil-square"></i></span>
                                        <textarea name="purpose" class="form-control" placeholder="Write here..." required></textarea>
                                    </div>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary w-100 mt-3">
                                <i class="bi bi-plus-circle me-1"></i> Add New Entry
                            </button>
                        </form>

                        {{-- <a href="{{ url('/dashboard') }}" class="btn btn-outline-secondary w-100 mt-2">
                        <i class="bi bi-arrow-left-circle me-1"></i> Go Back
                        </a> --}}

                    </div>
                </div>
            </main>

        </div>
    </div>

</x-layout>
