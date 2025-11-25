<x-layout>

    <h2>Are you sure to delete this category "{{$categoryList[0] -> name}}?"</h2>
    <a href="{{url('/category/'.$categoryList[0] -> category_id.'/destroy')}}" style="text-decoration: none;">Yes</a>
    <a href="{{url('/category')}}" style="text-decoration: none;">No</a>

</x-layout>