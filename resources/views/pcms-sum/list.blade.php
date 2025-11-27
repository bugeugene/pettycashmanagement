<x-layout>

<div class="container mt-4">
    <h3 class="mb-3">Petty Cash Summary Report</h3>

    <form action="{{url('/summary')}}" method="post">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <label>Start Date</label>
                <input type="date" name="start_date" class="form-control" required>
            </div>

            <div class="col">
                <label>End Date</label>
                <input type="date" name="end_date" class="form-control" required>
            </div>
        </div>

        <button class="btn btn-primary">Generate Summary</button>
    </form>
</div>


</x-layout>