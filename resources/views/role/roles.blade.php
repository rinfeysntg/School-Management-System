@extends('layoutrole')
@include('navbar_admin')


<div class="pad">
<form action="{{ route('rolesController') }}" method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" class="form-control" name="search" placeholder="Search Roles" value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Search</button>
    </div>
    <br>
    <div>
    <a class="btn btn-success" href="#" data-bs-toggle="modal" data-bs-target="#addRoleModal">Add Role</a>
    </div>
</form>
</div>

@section('RoleControl')
<h1 style="color:white">Role List</h1>

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

                    <!-- Display validation errors -->
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
                        <select class="form-control" name="name" required>
                            <option value="admin">Admin</option>
                            <option value="registrar">Registrar</option>
                            <option value="treasury">Treasury</option>
                            <option value="program_head">Program Head</option>
                            <option value="human_resource">Human Resource</option>
                            <option value="professors">Professors</option>
                            <option value="students">Students</option>
                        </select>
                        <label for="role">Role</label>
                    </div>
                    <button type="submit" class="btn btn-success">Add Role</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
