<x-layout>

    <h3><p>Are you sure to delete this entry "{{$entryList -> purpose}}?"</p></h3>
    <a href="{{url('/entries/'.$entryList[0] -> entry_id.'/destroy')}}" style="text-decoration: none;">Yes</a>
    <a href="{{url('/entries')}}" style="text-decoration: none;">No</a>

</x-layout>