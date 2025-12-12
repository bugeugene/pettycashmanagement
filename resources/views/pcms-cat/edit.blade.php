<x-layout>

    <div class="container-fluid">
        <div class="row">

            <nav id="sidebar" class="col-md-2 p-3 d-none d-md-block bg-light sidebar min-vh-100">
                <div class="position-sticky">
                    <ul class="nav flex-column p-3">
                        <li class="mb-2 fw-bold">Menu</li>

                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ url('/dashboard') }}">
                                <i class="bi bi-speedometer me-2"></i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="{{ url('/category') }}">
                                <i class="bi bi-arrow-left-circle me-2"></i>Back
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-10 ms-sm-auto px-4 d-flex justify-content-center py-4">
                <div class="w-100">
                    <div class="p-4 border rounded-3 bg-white">

                        <h3 class="mb-4 text-center">Edit Category</h3>

                        <form action="{{ url('/category/' . $categoryList[0]->category_id . '/update') }}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold">Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $categoryList[0]->name }}" placeholder="Enter category name..." required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label fw-bold">Description</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-journal-text"></i></span>
                                    <textarea name="description" id="description" class="form-control" rows="4" placeholder="Write here..." required>{{ $categoryList[0]->description }}</textarea>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mt-3">
                                <i class="bi bi-pencil-square me-2"></i>Update Category
                            </button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>

</x-layout>
