@extends('layout')
@include('navbar_programhead')
@section('content')

<div class="rec_dashboard">
    
    <h1 class="createroomLbl">Create Schedule</h1>

    <div class="rec_dashboard2">

        <form class="cRoomsForm" action="{{ route('schedule.store') }}" method="POST">
            @csrf 
            
            <input type="hidden" name="curriculum_id" value="{{ $curriculum->id }}">

            <div class="mb-3">
                <label for="course_id" class="RbuildingLbl">Course:</label>
                <select id="dropdown" name="course_id" required>
                    <option value="">Select a course</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="year_level" class="RnamelBl">Year Level</label>
                <select id="dropdown" name="year_level" required>
                    <option value="">Select year level</option>
                    <option value="1Y">1st year</option>
                    <option value="2Y">2nd year</option>
                    <option value="3Y">3rd year</option>
                    <option value="4Y">4th year</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="block" class="RnamelBl">Block</label>
                <select id="dropdown" name="block" required>
                    <option value="">Select block</option>
                    <option value="B1">Block 1</option>
                    <option value="B2">Block 2</option>
                    <option value="B3">Block 3</option>
                    <option value="B4">Block 4</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="subject_id" class="RbuildingLbl">Subject:</label>
                <select id="dropdown" name="subject_id" required>
                    <option value="">Select a subject</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="user_id" class="RbuildingLbl">Professor:</label>
                <select id="dropdown" name="user_id" required>
                    <option value="">Select a professor</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="days_time" class="RnamelBl">Days and Time:</label>
                <input type="text" class="Nrooms_txt" id="days_time" name="days_time" required>
            </div>

            <div class="button-container">
                <button type="submit" class="createRoomBtn">Create</button>
            </div>
        </form>

    </div>
    
</div>

@endsection
