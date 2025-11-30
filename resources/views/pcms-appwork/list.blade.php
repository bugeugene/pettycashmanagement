<x-layout>

<h2>Mark Remarks Approvals</h2>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (empty($statuslist))
    <p>No entries pending approval.</p>
@else
    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>Entry ID</th>
                <th>Amount</th>
                <th>Purpose</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($statuslist as $sl)
                <tr>
                    <td>{{ $sl->entry_id }}</td>
                    <td>{{ $sl->amount }}</td>
                    <td>{{ $sl->purpose }}</td>
                    <td>{{ $sl->status }}</td>
                    <td>
                        <a href="{{ url('/approval/remark/' . $sl->entry_id) }}">
                            Review
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif


</x-layout>