<x-layout>

<h2>Pending Approvals</h2>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if (empty($pending))
    <p>No entries pending approval.</p>
@else
    <table border="1" cellpadding="8">
        <tr>
            <th>Entry ID</th>
            <th>Amount</th>
            <th>Purpose</th>
            <th>Action</th>
        </tr>

        @foreach ($pending as $p)
        <tr>
            <td>{{ $p->entry_id }}</td>
            <td>{{ $p->amount }}</td>
            <td>{{ $p->purpose }}</td>
            <td>
                <a href="/approval/{{ $p->entry_id }}">Review</a>
            </td>
        </tr>
        @endforeach
    </table>
@endif


</x-layout>