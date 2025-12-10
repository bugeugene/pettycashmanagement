<x-layout>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebar" class="col-md-2 p-3 d-none d-md-block bg-light sidebar min-vh-100">
            <div class="position-sticky">
                <ul class="nav flex-column p-3">
                    <li class="mb-2 fw-bold">Menu</li>

                    <li class="nav-item">
                        <a class="nav-link text-black" href="{{ url()->previous() }}">
                            <i class="bi bi-arrow-left-circle me-2"></i> Back
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="col-md-10 ms-sm-auto px-4 py-4">
            <h2 class="fw-bold mb-3">Entry Details</h2>

            <div class="container mt-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5 border-end">
                                <h5 class="mb-3"><i class="bi bi-file-earmark-text"></i> Entry Details</h5>

                                <p><i class="bi bi-person me-2"></i><strong>Requester:</strong> {{ $showdetails->requester }}</p>
                                <p><i class="bi bi-cash-stack me-2"></i><strong>Amount:</strong> {{ $showdetails->amount }}</p>
                                <p><i class="bi bi-clipboard me-2"></i><strong>Purpose:</strong> {{ $showdetails->purpose }}</p>
                                <p><i class="bi bi-check-circle me-2"></i><strong>Status:</strong> {{ $showdetails->status }}</p>
                            </div>

                            <div class="col-md-7">
                                <h5 class="mb-3"><i class="bi bi-pencil-square"></i> Remark</h5>

                                <form action="{{ url('/approval/remark') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="entry_id" value="{{ $showdetails->entry_id }}">

                                    <textarea class="form-control mb-3" rows="5" name="remarks" placeholder="Write remarks..." required></textarea>
                                    @if(!empty($remarks))
                                        <h6 class="mt-3">Previous Remarks</h6>
                                        <ul class="list-group">
                                            @foreach($remarks as $r)
                                                <li class="list-group-item">
                                                    <strong>{{ $r->approver_name }}:</strong> {{ $r->remarks }} 
                                                    <br>
                                                    <small class="text-muted">{{ $r->created_at }}</small>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    <button class="btn btn-primary mt-2"><i class="bi bi-save"></i> Save Remark</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>

</x-layout>