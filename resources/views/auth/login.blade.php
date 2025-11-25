<x-layout>

    <form action="{{url('/login')}}" method="post" 
        class="container mt-5 p-4 border rounded shadow-sm" style="max-width: 400px;">
        
        @csrf

        <h2 class="text-center mb-4">
            Log In to Your Account
        </h2>

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text"
                   name="username"
                   id="username"
                   class="form-control"
                   required
                   value="{{ old('username') }}">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password"
                   name="password"
                   id="password"
                   class="form-control"
                   required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Log In</button>

        @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $errors)
                <li>{{$errors}}</li>
            @endforeach
        </ul>
        @endif
    </form>

</x-layout>