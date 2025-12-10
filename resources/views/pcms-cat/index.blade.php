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
                @if (empty($categoryList))
                <div class="alert alert-info text-center">
                    There are no categories available.
                </div>
                @else
                <div class="card-header bg-white">
                    <h4 class="fw-bold"><i class="bi bi-view-list me-2"></i>Category List</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categoryList as $category)
                            <tr>
                                <td>
                                    <i class="bi bi-tags me-2 text-secondary"></i>
                                    <span class="fw-bold">{{ $category->name }}</span>
                                </td>
                                <td>
                                    <span class="text-muted">{{ $category->description }}</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="card-footer text-end">
                        <small class="text-muted">
                            Showing {{ count($categoryList) }} user{{ count($categoryList) !== 1 ? 's' : '' }}
                        </small>
                    </div>
                </div>
                @endif
            </main>
        </div>
    </div>

</x-layout>
