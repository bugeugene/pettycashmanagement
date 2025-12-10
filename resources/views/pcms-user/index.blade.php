<x-layout>

    @if(session('error'))
    <div class="alert alert-danger mt-2">
        {{ session('error') }}
    </div>
    @endif

    @if(session('success'))
    <div class="alert alert-success mt-2">
        {{ session('success') }}
    </div>
    @endif

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
                @if (empty($userList))
                <div class="alert alert-warning text-center">
                    There are no users in the system.
                </div>
                @else
                <div>
                    <h4 class="fw-bold"><i class="bi bi-people me-2"></i>User List</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover text-center align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userList as $user)
                            <tr>
                                <td>{{ $user->user_id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ ucfirst($user->role) }}</td>
                                <td>
                                    <a href="{{ url('/users/'.$user->user_id.'/edit') }}" class="btn btn-sm btn-outline-warning me-2">
                                        <i class="bi bi-pencil-square me-2"></i>Edit
                                    </a>

                                    <a href="{{ url('/users/'.$user->user_id.'/delete') }}" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash me-2"></i>Delete
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="card-footer text-end">
                        <small class="text-muted">
                            Showing {{ count($userList) }} user{{ count($userList) !== 1 ? 's' : '' }}
                        </small>
                    </div>
                </div>
                @endif

            </main>
        </div>
    </div>


</x-layout>
