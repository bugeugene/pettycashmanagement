<x-layout>

    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUserModal">
        Delete User
    </button>

    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="deleteUserModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    Are you sure you want to delete the user:
                    <strong>{{ $userList[0]->name }}</strong> ?
                </div>

                <div class="modal-footer">
                    <a href="{{ url('/users/' . $userList[0]->user_id . '/destroy') }}" class="btn btn-danger">
                        Yes, Delete
                    </a>

                    <a href="{{ url('/users') }}" class="btn btn-secondary">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </div>

</x-layout>