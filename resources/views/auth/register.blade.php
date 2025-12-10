<x-layout>

    <form action="{{ url('/register') }}" method="post"
        class="container mt-4 p-4 border rounded shadow-sm">
        @csrf

        <div class="text-center mb-4">
            <h1 class="text-secondary">Register</h1>
        </div>

        <div class="row">
            <div class="col-md-6">

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text"
                            name="name"
                            id="name"
                            placeholder="Enter your name"
                            class="form-control"
                            required
                            value="{{ old('name') }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                        <input type="text"
                            name="username"
                            id="username"
                            placeholder="Enter your username"
                            class="form-control"
                            required
                            value="{{ old('username') }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email"
                            name="email"
                            id="email"
                            placeholder="you@example"
                            class="form-control"
                            required
                            value="{{ old('email') }}">
                    </div>
                </div>
            </div>

            <div class="col-md-6">

                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-briefcase"></i></span>
                        <select name="role" id="role" class="form-select" required>
                            <option value="">-- Select Role --</option>
                            <option value="Requester">Requester</option>
                            <option value="Finance">Finance</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password"
                            name="password"
                            id="password"
                            placeholder="********"
                            class="form-control"
                            required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password"
                            name="password_confirmation"
                            id="password_confirmation"
                            placeholder="********"
                            class="form-control"
                            required>
                    </div>
                </div>

            </div>
        </div>

        <div class="text-center mt-3 mb-3">
            <h5 class="text-muted">
                Already have an account? <a href="{{ url('login') }}">Log In</a>
            </h5>
        </div>

        <button type="submit" class="btn btn-primary rounded-5 w-100">
            <i class="bi bi-person-plus me-2"></i> Register
        </button>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </form>
</x-layout>
