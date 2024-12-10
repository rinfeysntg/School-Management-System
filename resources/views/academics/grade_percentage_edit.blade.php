@extends('layout')
@include('navbar_professor')
@section('content')

<div class="rec_dashboard">
    <h1 class="createroomLbl">Edit Grade Breakdown</h1>

    <div class="rec_dashboard12" style="max-height: 400px; overflow-y: auto; border: 1px solid #ddd; padding: 10px;">

        <form class="cRoomsForm" method="POST" action="{{ route('grade_percentages.update', $gradePercentage->subject_id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="subject_id" class="RnamelBl">Subject:</label>
                <select class="Nrooms_txt" name="subject_id" id="subject_id" required>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}" 
                            @if($subject->id == $gradePercentage->subject_id) selected @endif>
                            {{ $subject->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="quiz_percentage" class="RnamelBl">Quiz Percentage:</label>
                <input type="number" 
                       name="quiz_percentage" 
                       id="quiz_percentage" 
                       class="Nrooms_txt" 
                       value="{{ old('quiz_percentage', $gradePercentage->quiz_percentage) }}" 
                       required 
                       min="0" 
                       max="100">
            </div>

            <div class="mb-3">
                <label for="exam_percentage" class="RnamelBl">Exam Percentage:</label>
                <input type="number" 
                       name="exam_percentage" 
                       id="exam_percentage" 
                       class="Nrooms_txt" 
                       value="{{ old('exam_percentage', $gradePercentage->exam_percentage) }}" 
                       required 
                       min="0" 
                       max="100">
            </div>

            <div class="mb-3">
                <label for="assignment_percentage" class="RnamelBl">Assignment Percentage:</label>
                <input type="number" 
                       name="assignment_percentage" 
                       id="assignment_percentage" 
                       class="Nrooms_txt" 
                       value="{{ old('assignment_percentage', $gradePercentage->assignment_percentage) }}" 
                       required 
                       min="0" 
                       max="100">
            </div>

            <div class="button-container-act">
                <button type="submit" class="btn btn-success">Update Grade Percentages</button>
                <a href="{{ route('grade_percentages.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>

    </div>
</div>

@endsection
