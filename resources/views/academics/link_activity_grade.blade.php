@extends('layouts.app')

@section('title', 'Link Activity Grade')

@section('content')
    <h1>Link Activity to Grade</h1>
    <form action="{{ route('activities.grade.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="activity_id" class="form-label">Activity</label>
            <select class="form-control" id="activity_id" name="activity_id" required>
                @foreach($activities as $activity)
                    <option value="{{ $activity->id }}">{{ $activity->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="grade_id" class="form-label">Grade</label>
            <select class="form-control" id="grade_id" name="grade_id" required>
                @foreach($grades as $grade)
                    <option value="{{ $grade->id }}">Student: {{ $grade->student->name }} (Term: {{ $grade->term }}, Year: {{ $grade->year }})</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="percentage" class="form-label">Percentage</label>
            <input type="number" step="0.01" class="form-control" id="percentage" name="percentage" required>
        </div>
        <div class="mb-3">
            <label for="grade_acquired" class="form-label">Grade Acquired</label>
            <input type="number" step="0.01" class="form-control" id="grade_acquired" name="grade_acquired" required>
        </div>
        <button type="submit" class="btn btn-primary">Link Activity Grade</button>
    </form>
@endsection
