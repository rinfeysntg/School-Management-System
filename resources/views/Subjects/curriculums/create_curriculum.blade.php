@extends('layout')
@include('registrar.navbar_registrar')
@section('content')
    <div class="curriculum-create-container">
        <h1>Create a New Curriculum</h1>

        <form action="{{ route('curriculums_store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Curriculum Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="form-group">
        <label for="code">Curriculum Code</label>
        <input type="text" class="form-control" id="code" name="code" required>
    </div>

    <div class="form-group">
        <label for="program_head">Program Head</label>
        <input type="text" class="form-control" id="program_head" name="program_head" required>
    </div>

    <label for="course_id">Select Course</label>
    <select name="course_id" id="course_id" required>
        @foreach($courses as $course)
            <option value="{{ $course->id }}">{{ $course->name }}</option>
        @endforeach
    </select>

    <br>
    <button type="submit" class="btn btn-primary">Create Curriculum</button>
</form>

    </div>
@endsection