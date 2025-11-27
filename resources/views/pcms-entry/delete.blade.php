<x-layout>

    {{-- <h3><p>Are you sure to delete this entry "{{$entry -> purpose}}?"</p></h3>
    <a href="{{url('/entries/'.$entry -> entry_id.'/destroy')}}" style="text-decoration: none;">Yes</a>
    <a href="{{url('/entries')}}" style="text-decoration: none;">No</a> --}}

    <form action="{{ url('/entries/'.$entry->entry_id.'/destroy') }}" method="POST">
    @csrf
    <h3><p>Are you sure to delete this entry "{{$entry -> purpose}}?"</p></h3>
        <button type="submit">Yes</button>
    </form>
    <a href="{{ url('/entries') }}">No</a>

</x-layout>