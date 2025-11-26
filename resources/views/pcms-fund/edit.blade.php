<x-layout>

<div class="container mt-2">

    <h2>Edit Petty Cash Fund</h2>

    <form action="{{url('/funds/'.$fund->fund_id.'/update')}}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Current Balance</label>
            <input type="number" class="form-control" name="current_balance" step="0.01"
                   value="{{ $fund->current_balance }}" required>
        </div>

        {{-- <button class="btn btn-primary">Update Fund</button> --}}
        <a href="{{url('/funds')}}" class="btn btn-secondary">Cancel</a>
    </form>

</div>

</x-layout>