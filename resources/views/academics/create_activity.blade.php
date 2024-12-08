@extends('layouts.app')

@section('title', 'Add New Activity')

@section('content')
    <h1>Add New Activity</h1>
    <form action="{{ route('activities.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Activity Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="score" class="form-label">Score</label>
            <input type="number" step="0.01" class="form-control" id="score" name="score" required>
        </div>
        <div class="mb-3">
            <label for="max_score" class="form-label">Max Score</label>
            <input type="number" step="0.01" class="form-control" id="max_score" name="max_score" required>
        </div>
        <div class="mb-3">
            <label for="subject_id" class="form-label">Subject</label>
            <select class="form-control" id="subject_id" name="subject_id" required>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="student_id" class="form-label">Student</label>
            <select class="form-control" id="student_id" name="student_id" required>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="prof_id" class="form-label">Professor</label>
            <select class="form-control" id="prof_id" name="prof_id" required>
                @foreach($professors as $professor)
                    <option value="{{ $professor->id }}">{{ $professor->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save Activity</button>
    </form>
@endsection
