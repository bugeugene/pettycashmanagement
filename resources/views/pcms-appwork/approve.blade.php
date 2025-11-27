<x-layout>

<h2>Approve Entry #{{ $entry->entry_id }}</h2>

<p><strong>Requester:</strong> {{ $entry->requester }}</p>
<p><strong>Amount:</strong> {{ $entry->amount }}</p>
<p><strong>Purpose:</strong> {{ $entry->purpose }}</p>

<form method="POST" action="/approval/submit">
    @csrf

    <input type="hidden" name="entry_id" value="{{ $entry->entry_id }}">

    <label>Remarks:</label>
    <textarea name="remarks"></textarea>

    <br><br>
    <button type="submit" name="status" value="approved">Approve</button>
    <button type="submit" name="status" value="rejected">Reject</button>
</form>


</x-layout>