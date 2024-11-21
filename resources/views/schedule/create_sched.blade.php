@extends('layout')
@include('registrar.navbar_registrar')
@section('content')

<div class="rec_dashboard">
    
    <h1 class="createroomLbl">Create Schedule</h1>

    <div class="rec_dashboard2">

        <form class="cRoomsForm" action="{{ route('schedule.store') }}" method="POST">
            @csrf 

            <div class="mb-3">
                <label for="building_id" class="RbuildingLbl">Course:</label>
                <select id="dropdown" name="building_id" required>
                    <option value="">Select a course</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="name" class="RnamelBl">Year Level and Block:</label>
                <input type="text" class="Nrooms_txt" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="building_id" class="RbuildingLbl">Subject:</label>
                <select id="dropdown" name="building_id" required>
                    <option value="">Select a subject</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="building_id" class="RbuildingLbl">Professor:</label>
                <select id="dropdown" name="building_id" required>
                    <option value="">Select a professor</option>
                    @foreach ($users as $user)
                        <option value="{{ $employee->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="name" class="RnamelBl">Days and Time:</label>
                <input type="text" class="Nrooms_txt" id="name" name="name" required>
            </div>

            <div class="button-container">
                <button type="submit" class="createRoomBtn">Create</button>
            </div>
        </form>

    </div>
    
</div>

@endsection
