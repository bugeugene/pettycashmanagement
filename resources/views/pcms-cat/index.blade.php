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
                        @if(Auth::user()->role === 'Admin')
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ url('/category/add') }}">
                                <i class="bi bi-folder me-2"></i>Create Category
                            </a>
                        </li>
                        @endif
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
                    <h4 class="fw-semibold"><i class="bi bi-view-list me-2"></i>Category List</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                @if(Auth::user()->role === 'Admin')
                                <th class="text-center">Action</th>
                                @endif
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
                                @if(Auth::user()->role === 'Admin')
                                <td class="text-center">
                                    <a href="{{ url('/category/'.$category->category_id.'/edit') }}" class="btn btn-sm btn-outline-warning me-2">
                                        <i class="bi bi-pencil-square me-2"></i>Edit
                                    </a>

                                    <a href="{{ url('/category/'.$category->category_id.'/delete') }}" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash me-2"></i>Delete
                                    </a>
                                </td>
                                @endif
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
