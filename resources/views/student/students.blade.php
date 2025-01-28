@extends('layoutuser')
@include('navbar_programhead')

<div class="pad">
<form action="{{ route('students_index') }}" method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" class="form-control" name="search" placeholder="Search Students" value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Search</button>
    </div>
    <br>
    <div>
    <a class="btn btn-success" href="#" data-bs-toggle="modal" data-bs-target="#addUserModal">Add Students</a>
    </div>
</form>
</div>
@section('UserControl')
<h1 style="color:white">Student List</h1>

<!-- User List Container -->
<div class="user-list">
    @include('student.student-cards') <!-- Assuming this dynamically includes user cards -->
</div>

<!-- Modal to Add User -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Add Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('store_student') }}" method="POST">
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

                            <!-- Department -->
                        <div class="form-floating mb-3">
                            <select class="form-control" name="department_id" required>
                                <option value="">Select department</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                            <label for="department_id">Department</label>
                        </div>

                    <!-- Course -->
                    <div class="form-floating mb-3">
                        <select class="form-control" name="course_id" required>
                            <option value="">Select course</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                        <label for="course_id">Course</label>
                    </div>

                    <div class="form-floating mb-3">
                <select class="form-control" name="year_level" required>
                    <option value="">Select year level</option>
                    <option value="1Y">1st year</option>
                    <option value="2Y">2nd year</option>
                    <option value="3Y">3rd year</option>
                    <option value="4Y">4th year</option>
                </select>
                <label for="year_level">Year Level</label>
            </div>

            <div class="form-floating mb-3">
                <select class="form-control" name="block" required>
                    <option value="">Select block</option>
                    <option value="B1">Block 1</option>
                    <option value="B2">Block 2</option>
                    <option value="B3">Block 3</option>
                    <option value="B4">Block 4</option>
                </select>
                <label for="block">Block</label>
            </div>

                    <button type="submit" class="btn btn-success">Add Student</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
