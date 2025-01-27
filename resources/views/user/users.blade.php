@extends('layoutuser')

<div class="pad">
<form action="{{ route('usersController') }}" method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" class="form-control" name="search" placeholder="Search Users" value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Search</button>
    </div>
    <br>
    <div>
    <a class="btn btn-success" href="#" data-bs-toggle="modal" data-bs-target="#addUserModal">Add Users</a>
    </div>
</form>
</div>
@section('UserControl')
<h1 style="color:white">User List</h1>

<!-- User List Container -->
<div class="user-list">
    @include('user.User-cards') <!-- Assuming this dynamically includes user cards -->
</div>

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

                    <!-- Show Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

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

                    <!-- Department -->
                    <div class="form-floating mb-3">
                        <select class="form-control" name="department_id">
                            <option value="">None</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                        <label for="department_id">Department</label>
                    </div>

                    <!-- Course -->
                    <div class="form-floating mb-3">
                        <select class="form-control" name="course_id">
                            <option value="">None</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                        <label for="course_id">Course</label>
                    </div>

                    <!-- Role -->
                    <div class="form-floating mb-3">
                        <select class="form-control" name="role_id" required>
                            <option value="">Select a role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
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
