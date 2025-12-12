<x-layout>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-2 p-3 d-none d-md-block bg-light sidebar min-vh-100">
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
                    <h2 class="mb-4 text-center text-primary">Add New User</h2>

                    <form action="{{ url('/users/create') }}" method="post">
                        @csrf
                        <div class="row g-3">

                            <div class="col-md-6">
                                <label for="name" class="form-label fw-bold">Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="username" class="form-label fw-bold">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="password" class="form-label fw-bold">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="********" minlength="6" maxlength="12" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label fw-bold">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="name@example.com" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="role" class="form-label fw-bold">Role</label>
                                <select name="role" id="role" class="form-select" required>
                                    <option value="">-- Select Role --</option>
                                    <option value="Requester">Requester</option>
                                    <option value="Finance">Finance</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary rounded-4 w-100 mt-3">
                            <i class="bi bi-person-plus me-2"></i>Add User
                        </button>
                    </form>
                </div>
                </div>
            </main>
        </div>
    </div>

</x-layout>
