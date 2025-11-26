<x-layout>

    <h3><p>Are you sure to delete this entry "{{$entry -> purpose}}?"</p></h3>
    <a href="{{url('/entries/'.$entry -> entry_id.'/destroy')}}" style="text-decoration: none;">Yes</a>
    <a href="{{url('/entries')}}" style="text-decoration: none;">No</a>

</x-layout>