@extends('layoutcourseEdit')
@section('courseEditDashboard')
<div class="glass">
    <h1 class="heading">Edit Course</h1>
    <div class="frame">
        <form id="editCourseForm" action="{{ route('courses.update', $course->id) }}" method="POST" onsubmit="return confirmUpdate()">
            @csrf
            @method('PUT') 
            @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="name" class="form-label">Course Name:</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $course->name) }}" required>
            </div>
            <br>
            <div class="form-group">
                <label for="description" class="form-label">Description:</label>
                <input type="text" name="description" class="form-control" value="{{ old('description', $course->description) }}" required>
            </div>
            <br>
            <div class="form-group">
                <label for="department_id" class="form-label">Department:</label>
                <select id="dropdown" name="department_id" class="form-control" required>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}" {{ $department->id == $course->department_id ? 'selected' : '' }}>
                            {{ $department->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="button-container">
                <button type="submit" class="btn btn-success" id="updateButton">Update Course</button>
            </div>
        </form>
        <br>
        <div class="button-container">
            <a href="{{ route('courseDashboard') }}"><button class="btn btn-secondary">Return</button></a>
        </div>
    </div>
</div>
@endsection
