<x-layout>

<h2>Approve Entry #{{ $entry->entry_id }}</h2>

<p><strong>Requester:</strong> {{ $entry->requester }}</p>
<p><strong>Amount:</strong> {{ $entry->amount }}</p>
<p><strong>Purpose:</strong> {{ $entry->purpose }}</p>

<form action="{{url('/approval/submit')}}" method="post">
    @csrf

    <input type="hidden" name="entry_id" value="{{ $entry->entry_id }}">

    <label>Remarks:</label>
    <textarea name="remarks" placeholder="write here..." required>{{ old('remarks', $entry->remarks) }}</textarea>

    <br><br>
    <button type="submit" name="status" value="Approved" class="btn btn-success me-2">
        Approve
    </button>
    <button type="submit" name="status" value="Rejected" class="btn btn-danger">
        Reject
    </button>
</form>

</x-layout>