@extends('layout')
@include('navbar_professor')
@section('content')
    <div class="container">
        <h1 class="my-4">Grade Breakdown</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Quiz Percentage</th>
                    <th>Exam Percentage</th>
                    <th>Assignment Percentage</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($gradePercentages as $gradePercentage)
                    <tr>
                        <td>{{ $gradePercentage->subject->name }}</td>
                        <td>{{ $gradePercentage->quiz_percentage }}%</td>
                        <td>{{ $gradePercentage->exam_percentage }}%</td>
                        <td>{{ $gradePercentage->assignment_percentage }}%</td>
                        <td>
                            <a href="{{ route('grade_percentages.edit', $gradePercentage->subject_id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('grade_percentages.destroy', $gradePercentage->subject_id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('grade_percentages.create') }}" class="btn btn-success">Create Grade Breakdown</a>
    </div>
@endsection
