<x-layout>

    <h3>Edit New User</h3>
    <form action="{{url('/users/'.$userList[0] -> user_id.'/update')}}" method="post">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="" value="{{$userList[0] -> name}}">
        <!-- <br> -->
        <label for="username">Username:</label>
        <input type="text" name="username" id="" value="{{$userList[0] -> username}}">
        <!-- <br> -->
        <label for="password">Password:</label>
        <input type="password" name="password" id="" value="{{$userList[0] -> password}}">
        <!-- <br> -->
        <label for="email">Email:</label>
        <input type="email" name="email" id="" value="{{$userList[0] -> email}}">
        <!-- <br> -->
        <label for="role">Role</label>
        <select name="role" id="">
            <option value="">-- Select Role --</option>
            <option value="Requester" {{ $userList[0] -> role == 'Requester' ? 'selected' : ''}}>Requester</option>
            <option value="Finance" {{ $userList[0] -> role == 'Finance' ? 'selected' : '' }}>Finance</option>
            <option value="Admin" {{ $userList[0] -> role == 'Admin' ? 'selected' : '' }}>Admin</option>
        </select>
        <button type="submit">Update User</button>
    </form>
    <br>
    <a href="{{url('/users')}}" style="text-decoration: none;">Go back</a>

</x-layout>