<x-layout>

    {{-- @if(session('error'))
        <div class="alert alert-danger mt-2">
            {{ session('error') }}
    </div>
    @endif

    @if(session('success'))
    <div class="alert alert-success mt-2">
        {{ session('success') }}
    </div>
    @endif --}}

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-2 shadow-lg rounded p-3 d-none d-md-block bg-white sidebar min-vh-100">
                <div class="position-sticky">
                    <ul class="nav flex-column p-3">
                        <li class="mb-2 fw-bold">Menu</li>

                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ url()->previous() }}">
                                <i class="bi bi-arrow-left-circle"></i> Back
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto px-4">

                @if ($entryList->isEmpty())
                <div class="alert alert-info text-center mt-3">
                    There are no entries available.
                </div>
                @else
                <div class="mt-3">
                    <h2 class="fw-bold mb-3"><i class="bi bi-cash-stack me-2"></i> Petty Cash Entries</h2>
                </div>
                <div class="row g-3">
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
                                <p class="mb-1"><strong>Purpose:</strong> {{$entry->purpose}}</p>
                                <p class="mb-1"><strong>Amount:</strong> {{ $entry->amount }}</p>
                                <p class="mb-1"><strong>Date:</strong> {{ $entry->date }}</p>
                                <p class="mb-1"><strong>Entry Type:</strong> {{ $entry->entry_type }}</p>
                                <p class="mb-1"><strong>Created By:</strong> {{ $entry->created_by }}</p>

                                <span class="badge bg-{{ 
                                        $entry->status == 'Approved' ? 'success' : ($entry->status == 'Rejected' ? 'danger' : 'warning') }}">
                                    {{ $entry->status }}
                                </span>

                                @if(Auth::user()->role === 'Requester' && $entry->status === 'Pending')
                                <div class="mt-2">
                                    <a href="{{ url('/entries/'.$entry->entry_id.'/edit') }}" class="btn btn-primary btn-sm">Update</a>
                                    <a href="{{ url('/entries/'.$entry->entry_id.'/delete') }}" class="btn btn-danger btn-sm">Delete</a>
                                </div>
                                @elseif(Auth::user()->role === 'Finance')
                                <div class="mt-2">
                                    <a href="{{ url('/entries/'.$entry->entry_id.'/edit') }}" class="btn btn-primary btn-sm">Update</a>
                                    <a href="{{ url('/entries/'.$entry->entry_id.'/delete') }}" class="btn btn-danger btn-sm">Delete</a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </main>
        </div>
    </div>

</x-layout>
