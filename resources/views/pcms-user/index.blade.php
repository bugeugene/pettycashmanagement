<x-layout>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (empty($userList))
        <div class="alert alert-warning text-center">
            There are no users in the system.
        </div>
    @else
        <table style="text-align: center;" cellspacing="5" class="table table-striped table-hover">
            <thead>
                <th>Name</th>
                <th>Username</th>
                <th>Password</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($userList as $user)
                <tr>
                    <td>{{$user -> name}}</td>
                    <td>{{$user -> username}}</td>
                    <td>{{$user -> password}}</td>
                    <td>{{$user -> email}}</td>
                    <td>{{$user -> role}}</td>
                    <td>
                        <a href="{{url('/users/'.$user -> user_id.'/edit')}}" style="text-decoration: none;">Edit</a>
                        <a href="{{url('/users/'.$user -> user_id.'/delete')}}" style="text-decoration: none;">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</x-layout>