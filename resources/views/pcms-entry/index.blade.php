<x-layout>

    @if (empty($entryList))
        <div class="alert alert-info text-center mt-2">
            There are no entries available.
        </div>
    @else
    <div class="row g-3 mt-2">
        @foreach ($entryList as $entry)
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $entry->purpose }}</h5>
                        
                        <p class="mb-1"><strong>Amount:</strong> {{ $entry->amount }}</p>
                        <p class="mb-1"><strong>Date:</strong> {{ $entry->date }}</p>
                        <p class="mb-1"><strong>Entry Type:</strong> {{ $entry->entry_type }}</p>
                        <p class="mb-1"><strong>Created By:</strong> {{ $entry->created_by }}</p>

                        <span class="badge bg-{{ $entry->status == 'Approved' ? 'success' : 'warning' }}">
                            {{ $entry->status }}
                        </span>

                        <div class="mt-3">
                            <a href="{{ url('/entries/'.$entry->entry_id.'/edit') }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ url('/entries/'.$entry->entry_id.'/delete') }}" class="btn btn-danger btn-sm">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @endif

</x-layout>