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
                </ul>
            </div>
        </nav>

        <main class="col-md-10 ms-sm-auto px-4 py-4">
            <h2 class="mb-4"><i class="bi bi-cash-stack me-2"></i>Replenish Petty Cash Fund</h2>

            <form action="{{ url('/funds/replenish') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-bold">Amount to Add</label>
                    <input type="number" class="form-control" name="amount" placeholder="Enter amount" step="0.01" required>
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <a href="{{ url('/funds') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left-circle me-2"></i>Cancel
                    </a>
                    <button class="btn btn-success">
                        <i class="bi bi-cash-stack me-2"></i>Replenish Fund
                    </button>
                </div>
            </form>
        </main>
    </div>
</div>

</x-layout>