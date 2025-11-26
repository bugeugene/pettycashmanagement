<x-layout>

    @if (empty($entryList))
        <div class="alert alert-info text-center mt-2">
            There are no entries available.
        </div>
    @else

    <!-- Flash Messages -->
    @if(session('error'))
        <div class="alert alert-danger mb-2">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success mb-2">
            {{ session('success') }}
        </div>
    @endif

    <div class="row g-3 mt-2">
        @foreach ($entryList as $entry)
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">
                                @if(!empty($entry->categories))
                                    @foreach ($entry->categories as $category)
                                        {{ $category->name }}@if(!$loop->last),@endif
                                    @endforeach
                                @else
                                    <div class="alert alert-info text-center mt-2">
                                        No Category.
                                    </div>
                                @endif
                            </h5>
                        <h5 class="card-subtitle text-secondary">{{ $entry->purpose }}</h5>
                        
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