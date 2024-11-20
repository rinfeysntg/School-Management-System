@extends('layout')
@include('registrar.navbar_registrar')
@section('content')
<div class="rec_dashboard">
    <h1 class="createroomLbl">Edit Schedule</h1> 

    <div class="rec_dashboard2">

        <form class="cRoomsForm" action="{{ route('schedule.update', $schedule->id) }}" method="POST">
            @csrf
            @method('PUT')

        <div class="mb-3">
            <label for="program_head" class="form-label">Course ID:{{ $schedule->course_id }}</label>
            <select name="course_id" id="course_id" required>
            @foreach($courses as $course)
                <option value="{{ $course->id }}">{{ $course->name }}</option>
            @endforeach
            </select>
        </div>

            <div class="mb-3">
                <label for="name" class="RnamelBl">Year Level and Block:</label>
                <input type="text" class="Nrooms_txt" id="name" name="name" value="{{ $schedule->year_level) }}" required>
            </div>

        <div class="mb-3">
            <label for="program_head" class="form-label">Subject ID:{{ $schedule->subject_id }}</label>
            <select name="subject_id" id="subject_id" required>
            @foreach($subjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
            @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="program_head" class="form-label">Employee ID:{{ $schedule->employee_id }}</label>
            <select name="employee_id" id="employee_id" required>
            @foreach($employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
            @endforeach
            </select>
        </div>

         <div class="mb-3">
                <label for="name" class="RnamelBl">Days and Time:</label>
                <input type="text" class="Nrooms_txt" id="name" name="name" value="{{ $schedule->days_time) }}" required>
            </div>

            <div class="button-container">
                <button type="submit" class="createRoomBtn">Update</button> 
        </form>

    </div>
</div>
@endsection
