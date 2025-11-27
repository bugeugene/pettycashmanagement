<x-layout>

    <div class="d-flex justify-content-center mt-5">
        <div class="w-50">
            <div class="p-4 border rounded-4 shadow-lg bg-white">

                <h3 class="mb-4 text-center">Add New Petty Cash Entry</h3>

                <form action="{{ url('/entries/create') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold">Category</label>
                        <select name="category_id" required class="form-select">
                            <option value="">-- Select Category --</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->category_id }}">{{ $cat->name }}</option>
                                @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Purpose</label>
                        <textarea name="purpose" class="form-control" placeholder="Write here..." required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold" >Amount</label>
                        <input type="number" name="amount" step="0.01" min="0" max="99999999.99"
                               class="form-control" placeholder="Enter amount" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Date</label>
                        <input type="date" name="date" required class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Entry Type</label>
                        <select name="entry_type" required class="form-select">
                            <option value="">Select your entry</option>
                            <option value="Request">Request</option>
                            <option value="Replenishment">Replenishment</option>
                            <option value="Adjustment">Adjustment</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Add New Entry</button>
                </form>

                <a href="{{ url('/entries') }}" class="btn btn-secondary w-100 mt-3">Go Back</a>
            </div>
        </div>
    </div>

</x-layout>
