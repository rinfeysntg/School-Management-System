@extends('layoutuser')

@section('UserControl')
<br>
<div>
    <a class="btn btn-success" href="#" data-bs-toggle="modal" data-bs-target="#addRoleModal">Add Role</a>
</div>

<h1>Role List</h1>

<!-- Search Bar -->
<form action="{{ route('rolesController') }}" method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" class="form-control" name="search" placeholder="Search Roles" value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Search</button>
    </div>
</form>

<!-- Include Role Cards here -->
@include('role.role-cards')

<!-- Modal to Add Role -->
<div class="modal fade" id="addRoleModal" tabindex="-1" aria-labelledby="addRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRoleModalLabel">Create Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('store_role') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Name" required>
                        <label for="name">Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="description" placeholder="description" required>
                        <label for="description">description</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="yearlevel" placeholder="yearlevel" required>
                        <label for="yearlevel">yearlevel</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-control" name="dept_id" required>
                            @foreach ($roleNames as $roleName => $roleId)
                                <option value="{{ $roleName }}">{{ ucfirst($roleName) }}</option>
                            @endforeach
                        </select>
                        <label for="dept_id">Role</label>
                    </div>

                    <button type="submit" class="btn btn-success">Add Role</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
