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
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if (empty($fund))
                <div class="alert alert-warning text-center mt-2" role="alert">
                    <strong>Oops!</strong> There are no funds in the system.
                    <a class="nav-link text-black" href="{{url('/funds/replenish')}}">
                        <i class="bi-coin-plus me-2"></i>Deposit Fund
                    </a>
                </div>
                @else
                <div class="card-header bg-white">
                    <h4 class="mb-4"><i class="bi bi-cash-stack me-2"></i>Petty Cash Fund Status</h4>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered align-middle">
                        <tbody>
                            <tr>
                                <th scope="row">Current Balance</th>
                                <td>{{ $fund->current_balance }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Last Replenished</th>
                                <td>{{ $fund->last_replenished_at }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Last Updated</th>
                                <td>{{ $fund->last_update }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ url('/funds/replenish') }}" class="btn btn-success">
                        <i class="bi bi-cash-stack me-2"></i> Replenish Fund
                    </a>
                </div>
                @endif
            </main>
        </div>
    </div>

</x-layout>
