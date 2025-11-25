<x-layout>

    <p><h3>Edit Petty Cash Entry</h3></p>
    <form action="{{url('/entries/'.$entryList[0] -> entry_id.'/update')}}" method="post">
        <table>
        @csrf
            <tr>
                <td valign="middle"><label for="purpose">Purpose</label></td>
                <!-- <td><textarea name="purpose" placeholder="write here..."></textarea></td> -->
                <td><input type="text" name="purpose" id="" value="{{$entryList[0] -> purpose}}"></td>
            </tr>
            <tr>
                <td><label for="amount">Amount</label></td>
                <td><input type="number" name="amount" id="" value="{{$entryList[0] -> amount}}" step="0.01" min="0" max="99999999.99" placeholder="Enter amount"></td>
            </tr>
            <tr>
                <td><label for="date">Date</label></td>
                <td><input type="date" name="date" value="{{$entryList[0] -> date}}" id=""></td>
            </tr>
            <tr>
                <td><label for="entry_type">Entry Type</label></td>
                {{-- <td><input type="text" name="entry_type" value="{{$entryList[0] -> entry_type}}" id=""></td> --}}
                <td>
                    <select name="entry_type" id="">
                        <option value="Request" {{ $entryList[0]->entry_type == 'Request' ? 'selected' : '' }}>Request</option>
                        <option value="Replenishment" {{ $entryList[0]->entry_type == 'Replenishment' ? 'selected' : '' }}>Replenishment</option>
                        <option value="Adjustement" {{ $entryList[0]->entry_type == 'Adjustement' ? 'selected' : '' }}>Adjustement</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="status">Status</label></td>
                <td>
                    <select name="status" id="">
                        <option value="Pending" {{ $entryList[0]->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Rejected" {{ $entryList[0]->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                        <option value="Approved" {{ $entryList[0]->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                    </select>
                </td>
            </tr>
        </table>
        <button type="submit">Update Entry</button>
    </form>
    <a href="{{url('/entries')}}" style="text-decoration: none;">Go Back</a>

</x-layout>