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
                <label for="course_id" class="RbuildingLbl">Course:</label>
                <select id="dropdown" name="course_id" required>
                    <option value="">Select a course</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}" {{ $course->id == $schedule->course_id ? 'selected' : '' }}>
                            {{ $course->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="year_level" class="RnamelBl">Year Level:</label>
                <select id="dropdown" name="year_level" required>
                    <option value="">Select year level</option>
                    <option value="1Y" {{ $schedule->year_level == '1Y' ? 'selected' : '' }}>1st year</option>
                    <option value="2Y" {{ $schedule->year_level == '2Y' ? 'selected' : '' }}>2nd year</option>
                    <option value="3Y" {{ $schedule->year_level == '3Y' ? 'selected' : '' }}>3rd year</option>
                    <option value="4Y" {{ $schedule->year_level == '4Y' ? 'selected' : '' }}>4th year</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="block" class="RnamelBl">Block:</label>
                <select id="dropdown" name="block" required>
                    <option value="">Select block</option>
                    <option value="B1" {{ $schedule->block == 'B1' ? 'selected' : '' }}>Block 1</option>
                    <option value="B2" {{ $schedule->block == 'B2' ? 'selected' : '' }}>Block 2</option>
                    <option value="B3" {{ $schedule->block == 'B3' ? 'selected' : '' }}>Block 3</option>
                    <option value="B4" {{ $schedule->block == 'B4' ? 'selected' : '' }}>Block 4</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="subject_id" class="RbuildingLbl">Subject:</label>
                <select id="dropdown" name="subject_id" required>
                    <option value="">Select a subject</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}" {{ $subject->id == $schedule->subject_id ? 'selected' : '' }}>
                            {{ $subject->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="user_id" class="RbuildingLbl">Professor:</label>
                <select id="dropdown" name="user_id" required>
                    <option value="">Select a professor</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $schedule->user_id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="days_time" class="RnamelBl">Days and Time:</label>
                <input type="text" class="Nrooms_txt" id="days_time" name="days_time" value="{{ $schedule->days_time }}" required>
            </div>

            <div class="button-container">
                <button type="submit" class="createRoomBtn">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection
