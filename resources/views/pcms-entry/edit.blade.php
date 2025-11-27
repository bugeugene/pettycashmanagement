<x-layout>

    <p><h3>Edit Petty Cash Entry</h3></p>
    <form action="{{url('/entries/'.$entry -> entry_id.'/update')}}" method="post">
        <table>
        @csrf
            <tr>
                <td valign="middle"><label for="purpose">Purpose</label></td>
                <td>
                    <textarea name="purpose" placeholder="write here...">{{$entry -> purpose}}</textarea>
                    </td> 
            </tr>
            <tr>
                <td><label for="amount">Amount</label></td>
                <td><input type="number" name="amount" id="" value="{{$entry -> amount}}" step="0.01" min="0" max="99999999.99" placeholder="Enter amount"></td>
            </tr>
            <tr>
                <td><label for="date">Date</label></td>
                <td><input type="date" name="date" value="{{$entry -> date}}" id=""></td>
            </tr>
            <tr>
                <td><label for="entry_type">Entry Type</label></td>
                <td>
                    <select name="entry_type" id="">
                        <option value="Request" {{ $entry -> entry_type == 'Request' ? 'selected' : '' }}>Request</option>
                        <option value="Replenishment" {{ $entry -> entry_type == 'Replenishment' ? 'selected' : '' }}>Replenishment</option>
                        <option value="Adjustement" {{ $entry -> entry_type == 'Adjustement' ? 'selected' : '' }}>Adjustement</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="status">Status</label></td>
                <td>
                    <select name="status" id="">
                        <option value="Pending" {{ $entry -> status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Rejected" {{ $entry -> status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                        <option value="Approved" {{ $entry -> status == 'Approved' ? 'selected' : '' }}>Approved</option>
                    </select>
                </td>
            </tr>
        </table>
        <button type="submit">Update Entry</button>
    </form>
    <a href="{{url('/entries')}}" style="text-decoration: none;">Go Back</a>

</x-layout>