@extends('layoutposition')
@include('navbar_admin')


<div class="pad">
    <form action="{{ route('positionsController') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Search Positions" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
        <br>
        <div>
            <a class="btn btn-success" href="#" data-bs-toggle="modal" data-bs-target="#addPositionModal">Add Position</a>
        </div>
    </form>
</div>

@section('PositionControl')
<h1 style="color:white">Position List</h1>

<!-- Search Bar -->

<!-- Include Position Cards here -->
@include('position.Position-cards')

<!-- Modal to Add Position -->
<div class="modal fade" id="addPositionModal" tabindex="-1" aria-labelledby="addPositionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="color:white" class="modal-title" id="addPositionModalLabel">Create Position</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('store_position') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Name" required>
                        <label for="name">Name</label>
                        <!-- Display validation error for 'name' -->
                        @error('name')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="description" placeholder="Description" required>
                        <label for="description">Description</label>
                        <!-- Display validation error for 'description' -->
                        @error('description')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="rate" placeholder="Rate" required>
                        <label for="rate">Rate</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-control" name="role_id" required>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        <label for="role_id">Role</label>
                    </div>

                    <button type="submit" class="btn btn-success">Add Position</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
