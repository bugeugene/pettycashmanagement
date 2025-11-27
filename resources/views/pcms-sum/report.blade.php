<x-layout>

<div class="container mt-4">
    <h3 class="mb-3">Summary Report: {{ $start_date }} to {{ $end_date }}</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Category ID</th>
                <th>Total Amount</th>
                <th>Total Transactions</th>
                <th>Entry Type</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($summary as $row)
            <tr>
                <td>{{ $row->category_id }}</td>
                <td>{{ $row->total_amount }}</td>
                <td>{{ $row->total_transactions }}</td>
                <td>{{ $row->entry_type }}</td>
                <td>{{ $row->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{url('/summary')}}" class="btn btn-secondary">Back</a>
</div>

</x-layout>