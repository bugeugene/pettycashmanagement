<x-layout>

    <form action="{{url('/register')}}" method="post"
        class="container mt-5 p-4 border rounded shadow-sm" style="max-width: 450px;">

        @csrf

    <h2 class="text-center mb-4">Register</h2>

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text"
               name="name"
               id="name"
               class="form-control"
               required
               value="{{ old('name') }}">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email"
               name="email"
               id="email"
               class="form-control"
               required
               value="{{ old('email') }}">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password"
               name="password"
               id="password"
               class="form-control"
               required>
    </div>

    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input type="password"
               name="password_confirmation"
               id="password_confirmation"
               class="form-control"
               required>
    </div>

    <button type="submit" class="btn btn-primary w-100">Register</button>

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