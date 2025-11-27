<x-layout>

<div class="container mt-2">
    <div class="card shadow-lg p-4" style="border-radius: 10px;">
        <h2 class="mb-2 text-primary">Add New User</h2>

        <form action="{{ url('/users/create') }}" method="post">
            @csrf

            <div class="mb-2">
                <label class="form-label">Name</label>
                <input type="text" name="name" placeholder="Enter your name" class="form-control" required>
            </div>

            <div class="mb-2">
                <label class="form-label">Username</label>
                <input type="text" name="username" placeholder="Enter your username" class="form-control" required>
            </div>

            <div class="mb-2">
                <label class="form-label">Password</label>
                <input type="password" name="password" placeholder="********" class="form-control" minlength="6" maxlength="12" required>
            </div>

            <div class="mb-2">
                <label class="form-label">Email</label>
                <input type="email" name="email" placeholder="name@example.com" class="form-control" required>
            </div>

            <!-- DROPDOWN WITH COLOR -->
            <div class="mb-2">
                <label class="form-label">Role</label>
                <select name="role" class="form-select bg-info text-white fw-bold" required>
                    <option value="" class="text-dark">-- Select Role --</option>
                    <option value="Requester">Requester</option>
                    <option value="Finance">Finance</option>
                    <option value="Admin">Admin</option>
                </select>
            </div>

            <div class="rounded-5">
            <button type="submit" class="btn btn-primary w-100 mt-2">Add User</button>
            </div>
        </form>

        <a href="{{ url('/users') }}" class="btn btn-link mt-2">Go back</a>
    </div>
</div>

</x-layout>
