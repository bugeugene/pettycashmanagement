<x-layout>

    <h2>Remarks for Entry #{{ $entry->entry_id }}</h2>

    <p><strong>Requester:</strong> {{ $entry->requester }}</p>
    <p><strong>Amount:</strong> {{ $entry->amount }}</p>
    <p><strong>Purpose:</strong> {{ $entry->purpose }}</p>
    <p><strong>Status:</strong> {{ $entry->status}}</p>

    <form  action="{{url('/approval/remark')}}" method="post">
        @csrf

        <input type="hidden" name="entry_id" value="{{ $entry->entry_id }}">

        <label>Add Remark:</label>
        <textarea name="remarks" required></textarea>

        <br><br>
        <button type="submit">Save Remark</button>
    </form>

</x-layout>