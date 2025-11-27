<x-layout>

<div class="container mt-2">

    <h2>Replenish Petty Cash Fund</h2>

    <form action="{{url('/funds/replenish')}}" method="post">
        @csrf

        <div class="mb-2">
            <label class="form-label">Amount to Add</label>
            <input type="number" class="form-control" name="amount" step="0.01" required>
        </div>

        <button class="btn btn-success">Replenish Fund</button>
        <a href="{{url('/funds')}}" class="btn btn-secondary">Cancel</a>
    </form>

</div>

</x-layout>