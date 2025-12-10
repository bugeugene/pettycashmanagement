<x-layout>

    <h2>Edit Category</h2>
    <form action="{{url('/category/'.$categoryList[0] -> category_id.'/update')}}" method="post">
        @csrf
        <table>
            <tr>
                <td> <label for="name">Name:</label>
                <td><input type="text" name="name" id="" value="{{$categoryList[0] -> name}}"></td>
            </tr>
            <tr>
                <td><label for="description">Description:</label></td>
                <!-- <td><textarea name="description" cols="40" rows="5" value="{{$categoryList[0] -> description}}"></textarea></td> -->
                <td><input type="text" name="description" id="" value="{{$categoryList[0] -> description}}"></td>
            </tr>
        </table>
        <button type="submit">Update Category</button>
    </form>
    <br>
    <a href="{{url('/category')}}" style="text-decoration: none;">Go Back</a>

</x-layout>