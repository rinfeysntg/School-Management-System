@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Grade Breakdown</h2>

    <form method="POST" action="{{ route('grade_percentages.update', $gradePercentage->subject_id) }}">
        @csrf
        @method('PUT') <!-- Indicate that it's a PUT request for updating -->

        <div class="form-group">
            <label for="subject_id">Subject</label>
            <select name="subject_id" id="subject_id" class="form-control">
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}" 
                        @if($subject->id == $gradePercentage->subject_id) selected @endif>
                        {{ $subject->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="quiz_percentage">Quiz Percentage</label>
            <input type="number" 
                   name="quiz_percentage" 
                   id="quiz_percentage" 
                   class="form-control" 
                   value="{{ old('quiz_percentage', $gradePercentage->quiz_percentage) }}" 
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
                   value="{{ old('exam_percentage', $gradePercentage->exam_percentage) }}" 
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
                   value="{{ old('assignment_percentage', $gradePercentage->assignment_percentage) }}" 
                   required 
                   min="0" 
                   max="100">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Grade Percentages</button>
        </div>
    </form>
</div>
@endsection
