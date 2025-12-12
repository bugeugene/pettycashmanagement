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
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ url('/users') }}">
                                <i class="bi bi-arrow-left-circle me-2"></i>Back
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-10 ms-sm-auto px-4 py-4 d-flex justify-content-center align-items-center">
                <div class="p-4 border rounded bg-light text-center w-100">

                    <p class="mb-4">
                        <i class="bi bi-exclamation-triangle-fill text-danger me-2"></i>
                        Are you sure you want to delete this user?<br>
                        <strong>This action cannot be undone.</strong>
                    </p>

                    <div class="d-flex justify-content-center gap-3">
                        <a href="{{ url('/users') }}" class="btn btn-outline-primary">
                            Cancel
                        </a>

                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUserModal">
                            Delete User
                        </button>
                    </div>

                </div>

                <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteUserModalLabel">Confirm Delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                Are you sure you want to delete the user:
                                <strong>{{ $userList[0]->name }}</strong>?
                            </div>

                            <div class="modal-footer">
                                <a href="{{ url('/users') }}" class="btn btn-secondary">
                                    Cancel
                                </a>
                                <a href="{{ url('/users/' . $userList[0]->user_id . '/destroy') }}" class="btn btn-danger">
                                    Yes
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

</x-layout>
