<x-layout>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav id="sidebar" class="col-md-2 shadow-lg rounded p-3 d-none d-md-block bg-white sidebar min-vh-100">
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

        <!-- Main Content -->
        <main class="col-md-10 ms-sm-auto px-4 py-4">
        
            @if (empty($categoryList))
                <div class="alert alert-info text-center mt-2">
                    There are no categories available.
                </div>
            @else
            <div class="card-header bg-white">
                <h4 class="fw-bold"><i class="bi bi-grid me-2"></i> Category List</h4>
            </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle text-center">
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
                                        <i class="bi bi-tags me-2 text-primary"></i>
                                        <span class="fw-bold">{{ $category->name }}</span>
                                    </td>
                                    <td>{{ $category->description }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </main>
    </div>
</div>

</x-layout>