@extends('layoutuser')

@section('UserControl')
<br>
<div>
    <a class="btn btn-success" href="#" data-bs-toggle="modal" data-bs-target="#addUserModal">Add Users</a>
</div>

<h1>User List</h1>

<!-- Include User Cards here -->
@include('user.User-cards')

<!-- Modal to Add User -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Create User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('store_user') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Name" required>
                        <label for="name">Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="age" placeholder="Age" required>
                        <label for="age">Age</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="address" placeholder="Address" required>
                        <label for="address">Address</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                        <label for="username">Username</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                        <label for="email">Email</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                        <label for="password">Password</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-control" name="role_id" required>
                            <option value="admin">Admin</option>
                            <option value="registrar">Registrar</option>
                            <option value="treasury">Treasury</option>
                            <option value="program_head">Program Head</option>
                            <option value="human_resource">Human Resource</option>
                            <option value="professors">Professors</option>
                            <option value="students">Students</option>
                        </select>
                        <label for="role_id">Role</label>
                    </div>

                    <button type="submit" class="btn btn-success">Add User</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
