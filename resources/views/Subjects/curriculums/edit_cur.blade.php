@extends('layout')

@section('content')

<h1>Edit Curriculum</h1>

<form action="{{ route('curriculums_update', $curriculum->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Curriculum Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $curriculum->name }}" required>
    </div>

    <div class="mb-3">
        <label for="code" class="form-label">Curriculum Code</label>
        <input type="text" class="form-control" id="code" name="code" value="{{ $curriculum->code }}" required>
    </div>

    <div class="mb-3">
        <label for="program_head" class="form-label">Program Head</label>
        <input type="text" class="form-control" id="program_head" name="program_head" value="{{ $curriculum->program_head }}" required>
    </div>
    
    <div class="mb-3">
        <label for="program_head" class="form-label">{{ $curriculum->course_id }}</label>
        <select name="course_id" id="course_id" required>
        @foreach($courses as $course)
            <option value="{{ $course->id }}">{{ $course->name }}</option>
        @endforeach
    </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('curriculums_index') }}" class="btn btn-secondary">Cancel</a>
</form>

@endsection
