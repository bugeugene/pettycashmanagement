<x-layout>

    <div class="d-flex justify-content-center mt-5">
        <div class="w-50">
            <div class="p-4 border rounded-4 shadow-lg bg-white">

                <h3 class="mb-4 text-center">Add New Petty Cash Entry</h3>

                <form action="{{ url('/entries/create') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-bold">Category</label>
                        <select name="category" required class="form-select">
                            <option value="" class="text-dark">-- Select Category --</option>
                            <option value="Office Supplies">Office Supplies</option>
                            <option value="Travel">Travel</option>
                            <option value="Meals">Meals</option>
                            <option value="Repairs">Repairs</option>
                            <option value="Utilities">Utilities</option>
                            <option value="Fuel">Fuel</option>
                            <option value="Parking Fees">Parking Fees</option>
                            <option value="Delivery Fees">Delivery Fees</option>
                            <option value="Cleaning Supplies">Cleaning Supplies</option>
                            <option value="Printing">Printing</option>
                            <option value="Postage">Postage</option>
                            <option value="Employee Allowance">Employee Allowance</option>
                            <option value="Snacks">Snacks</option>
                            <option value="Workshop Materials">Workshop Materials</option>
                            <option value="Software Subscriptions">Software Subscriptions</option>
                            <option value="Marketing Materials">Marketing Materials</option>
                            <option value="Miscellaneous">Miscellaneous</option>
                            <option value="Bank Charges">Bank Charges</option>
                            <option value="Emergency Purchases">Emergency Purchases</option>
                            <option value="Equipment Rentals">Equipment Rentals</option>
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
