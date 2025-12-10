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
                <form action="{{ url('/users/'.$userList[0]->user_id.'/update') }}" method="post" class="container mt-4 p-4 border rounded shadow-sm">
                    @csrf

                    <div class="text-center mb-4">
                        <h1 class="text-primary d-flex justify-content-center align-items-center">
                            <i class="bi bi-person-gear me-2"></i>Edit User
                        </h1>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter full name" value="{{ $userList[0]->name }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter username" value="{{ $userList[0]->username }}">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" value="{{ $userList[0]->email }}">
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-briefcase"></i></span>
                                    <select name="role" id="role" class="form-select">
                                        <option value="">-- Select Role --</option>
                                        <option value="Requester" {{ $userList[0]->role == 'Requester' ? 'selected' : '' }}>Requester</option>
                                        <option value="Finance" {{ $userList[0]->role == 'Finance' ? 'selected' : '' }}>Finance</option>
                                        <option value="Admin" {{ $userList[0]->role == 'Admin'     ? 'selected' : '' }}>Admin</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">New Password (optional)</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter new password">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm new password">
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-3">
                        <a href="{{ url('/users') }}" class="btn btn-outline-primary rounded-5">
                            <i class="bi bi-arrow-left-circle me-2"></i>Go Back
                        </a>

                        <button type="submit" class="btn btn-success rounded-5">
                            <i class="bi bi-check-circle me-2"></i>Update User
                        </button>
                    </div>

                </form>
            </main>
        </div>
    </div>

</x-layout>
