<x-layout>

    <form action="{{ url('/login') }}" method="post"
        class="container mt-4 p-4 border rounded shadow-sm" style="max-width: 500px;">
        @csrf

        <div class="text-center mb-3">
            <h1 class="text-secondary">Login</h1>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input type="text"
                       name="username"
                       id="username"
                       class="form-control"
                       required
                       value="{{ old('username') }}">
            </div>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input type="password"
                       name="password"
                       id="password"
                       class="form-control"
                       required>
            </div>
        </div>

        <div class="text-center mb-3">
            <h5>Don’t have an account? <a href="{{ url('register') }}">Sign Up</a></h5>
        </div>

        <button type="submit" class="btn btn-primary rounded-5 w-100">
            <i class="bi bi-person-fill-check"></i> Log In
        </button>

        @if ($errors->any())
            <ul class="mt-3 text-danger">
                @foreach ($errors->all() as $errors)
                    <li>{{ $errors }}</li>
                @endforeach
            </ul>
        @endif

    </form>

</x-layout>
