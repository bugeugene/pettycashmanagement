<x-layout>

    @if (empty($categoryList))
        <div class="alert alert-info text-center mt-2">
            There are no categories available.
        </div>
    @else

    <div class="container mt-2">
        <h2 class="text-center mb-2">Category List</h2>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-primary">
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categoryList as $category)
                    <tr>
                        <td>
                            <span class="fw-bold ">{{ $category->name }}</span>
                        </td>
                        <td>{{ $category->description }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    @endif

</x-layout>