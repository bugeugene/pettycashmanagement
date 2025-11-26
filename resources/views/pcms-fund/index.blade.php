<x-layout>

<div class="container mt-2">

    <h2 class="mb-3">Petty Cash Fund Status</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Current Balance</th>
            <td>{{ $fund->current_balance }}</td>
        </tr>
        <tr>
            <th>Last Replenished</th>
            <td>{{ $fund->last_replenished_at }}</td>
        </tr>
        <tr>
            <th>Last Updated</th>
            <td>{{ $fund->last_update }}</td>
        </tr>
    </table>

    {{-- <a href="{{url('/funds/'.$fund->fund_id.'/edit')}}" class="btn btn-primary">Edit Balance</a> --}}
    <a href="{{url('/funds/replenish')}}" class="btn btn-success">Replenish Fund</a>
    <a href="{{url('/entries')}}" class="btn btn-primary">Go Back</a>

</div>

</x-layout>