@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Grade Breakdown</h2>

    <form method="POST" action="{{ route('grade_percentages.store') }}">
        @csrf

        <div class="form-group">
            <label for="subject_id">Subject</label>
            <select name="subject_id" id="subject_id" class="form-control">
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="quiz_percentage">Quiz Percentage</label>
            <input type="number" 
                   name="quiz_percentage" 
                   id="quiz_percentage" 
                   class="form-control" 
                   required 
                   min="0" 
                   max="100">
        </div>

        <div class="form-group">
            <label for="exam_percentage">Exam Percentage</label>
            <input type="number" 
                   name="exam_percentage" 
                   id="exam_percentage" 
                   class="form-control" 
                   required 
                   min="0" 
                   max="100">
        </div>

        <div class="form-group">
            <label for="assignment_percentage">Assignment Percentage</label>
            <input type="number" 
                   name="assignment_percentage" 
                   id="assignment_percentage" 
                   class="form-control" 
                   required 
                   min="0" 
                   max="100">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create Grade Breakdown</button>
        </div>
    </form>
</div>
@endsection
