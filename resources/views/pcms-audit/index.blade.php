<x-layout>

    <h2>Audit Logs</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Timestamp</th>
                <th>User</th>
                <th>Entry ID</th>
                <th>Action</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
                <tr>
                    <td>{{ $log->time_stamp }}</td>
                    <td>{{ $log->user_name }}</td>
                    <td>{{ $log->entry_id }}</td>
                    <td>{{ $log->action_type }}</td>
                    <td>{{ $log->details }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-layout>