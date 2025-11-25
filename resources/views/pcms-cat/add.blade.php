<x-layout>

    <p><h3>Add new category</h3></p>
    <form action="{{url('/category/create')}}" method="post">
        @csrf
        <table>
            <tr>
                <td><label for="name">Name:</label></td>
                <td><input type="text" name="name" placeholder="Enter category name..."></td>
            </tr>
            <tr>
                <td valign="middle"><label for="description">Description:</label></td>
                <td><textarea name="description" cols="30" rows="5" placeholder="Write here..."></textarea></td>
            </tr>
        </table>
        <button type="submit">Add Category</button>
    </form>
    <br>
    <a href="{{url('/category')}}" style="text-decoration: none;">Go Back</a>

</x-layout>