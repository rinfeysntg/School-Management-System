@extends('layout')
@include('navbar_professor')

@section('content')

<div class="rec_dashboard">
    <h1 class="createroomLbl">Grade Breakdown</h1>

    @if($gradePercentages->isEmpty())
        <div class="alert alert-info">
            No grade breakdown found.
        </div>
    @else
        <div class="rec_dashboard3" style="max-height: 400px; overflow-y: auto; border: 1px solid #ddd; padding: 10px;">
            <table class="rooms-table">
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
                                <form action="{{ route('grade_percentages.destroy', $gradePercentage->subject_id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <div class="button-container">
        <a href="{{ route('grade_percentages.create') }}" class="createRoomBtn2">Create Grade Breakdown</a>
    </div>
</div>

@endsection
