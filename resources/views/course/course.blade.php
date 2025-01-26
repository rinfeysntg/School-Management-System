@extends('layoutcourse')

@section('coursedashboard')
<div class="glass">
    <h1 class="heading">Create Courses</h1>
    <div class="frame">
        <form id="createCourseForm" action="{{ route('courses.store') }}" method="POST" onsubmit="return confirmCreate()">
            @csrf

            @error('name')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror

            <h4>Name: 
                <input type="text" name="name" required>
            </h4>

            <br>
            <h4>Description: <input type="text" name="description" required></h4>
            <br>
            <h4>Department: 
                <select id="dropdown" name="department_id" required>
                    <option value="">Select a department</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </h4>
            <br>
            <div class="button-container">
                <button type="submit" class="btn" id="createButton">Create</button>
            </div>
        </form>
        <br>
        <div class="button-container">
            <a href="{{ route('courseDashboard') }}"><button class="btn">Return</button></a>
        </div>
    </div>
</div>
@endsection
