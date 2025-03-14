@extends('layout')

@include('navbar_professor')

@section('content')

<div class="rec_dashboard">
    <h1 class="createroomLbl">Student List</h1>

    <div class="student-filter mb-4" style="padding: 10px;  display: flex; justify-content: center; align-items: center;">
        <form action="{{ route('students.show') }}" method="GET">
            <div class="row">
                <div class="col-md-6">
                    <select name="subject_id" id="subject_id" class="form-control" onchange="this.form.submit()">
                        <option value="">Select Subject</option>
                        @foreach($schedules->unique('subject_id') as $schedule)
                            <option value="{{ $schedule->subject_id }}" 
                                {{ request('subject_id') == $schedule->subject_id ? 'selected' : '' }}>
                                {{ $schedule->subject->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <select name="block" id="block" class="form-control" onchange="this.form.submit()">
                        <option value="">Select Block</option>
                        @foreach($schedules->unique('block') as $schedule)
                            <option value="{{ $schedule->block }}" 
                                {{ request('block') == $schedule->block ? 'selected' : '' }}>
                                Block {{ $schedule->block }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
    </div>

    @if($students->isEmpty())
        <div class="alert alert-info">
            No students found for your subjects.
        </div>
    @else
        <div class="rec_dashboard4" style="max-height: 400px; overflow-y: auto; border: 1px solid #ddd; padding: 10px;">
            <table class="rooms-table">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Final Grade</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td><strong>{{ $student->course->name }}</strong><br>
                                <span class="year_level">{{ $student->year_level }} - {{ $student->block }}</span>
                            </td>
                            <td>
                                @if (isset($finalGrades[$student->id]))
                                    {{ number_format($finalGrades[$student->id], 2) }}
                                @else
                                    Not Graded
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

@endsection
