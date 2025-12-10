<x-layout>

    <div class="container-fluid">
        <div class="row">

            <nav id="sidebar" class="col-md-2  p-3 d-none d-md-block bg-light sidebar min-vh-100">
                <div class="position-sticky">
                    <ul class="nav flex-column p-3">
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ url('/dashboard') }}">
                                <i class="bi bi-speedometer me-2"></i> Dashboard
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-10 ms-sm-auto px-4 py-4 d-flex justify-content-center align-items-center">

                <div class="p-4 border rounded bg-light text-center w-100">

                    <p class="mb-4">
                        <i class="bi bi-exclamation-triangle-fill text-danger me-2"></i>
                        Are you sure you want to delete this entry?<br>
                        <strong>"{{ $entry->purpose }}"</strong>
                    </p>

                    <div class="d-flex justify-content-center gap-3">
                        <a href="{{ url('/entries') }}" class="btn btn-outline-primary">
                            Cancel
                        </a>

                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteEntryModal">
                            Delete Entry
                        </button>
                    </div>

                </div>

                <div class="modal fade" id="deleteEntryModal" tabindex="-1" aria-labelledby="deleteEntryModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteEntryModalLabel">Confirm Delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                Are you sure you want to delete the entry:
                                <strong>"{{ $entry->purpose }}"</strong>?
                            </div>

                            <div class="modal-footer">
                                <form action="{{ url('/entries/'.$entry->entry_id.'/destroy') }}" method="POST">
                                    @csrf
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">
                                        Cancel
                                    </button>
                                    <button type="submit" class="btn btn-danger">
                                        Yes
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

</x-layout>
