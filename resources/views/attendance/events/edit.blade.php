@extends('layout')
@include('navbar_programhead')

@section('content')
    <div class="rec_dashboard">
        <h1 class="createroomLbl">Edit Event</h1>

        <div class="rec_dashboard12" style="max-height: 400px; overflow-y: auto; border: 1px solid #ddd; padding: 10px;">
            <form class="cRoomsForm" method="POST" action="{{ route('attendance.events.update', $event->id) }}">
                @csrf
                @method('PUT')

                <!-- Event Name -->
                <div class="mb-3">
                    <label for="event_name" class="RnamelBl">Event Name:</label>
                    <input type="text" id="event_name" name="event_name" class="Nrooms_txt" value="{{ old('event_name', $event->name) }}" required>
                    @error('event_name')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Event Date -->
                <div class="mb-3">
                    <label for="event_date" class="RnamelBl">Event Date:</label>
                    <input type="date" id="event_date" name="event_date" class="Nrooms_txt" value="{{ old('event_date', $event->event_date) }}" required>
                    @error('event_date')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Event Time -->
                <div class="mb-3">
                    <label for="event_time" class="RnamelBl">Event Time:</label>
                    <input type="time" id="event_time" name="event_time" class="Nrooms_txt" value="{{ old('event_time', $event->event_time) }}">
                    @error('event_time')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Course -->
                <div class="mb-3">
                    <label for="course_id" class="RnamelBl">Course:</label>
                    <select id="course_id" name="course_id" class="Nrooms_txt" required>
                        <option value="" disabled>Select a course</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}" {{ old('course_id', $event->course_id) == $course->id ? 'selected' : '' }}>
                                {{ $course->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('course_id')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Year Level -->
                <div class="mb-3">
                    <label for="year_level" class="RnamelBl">Year Level:</label>
                    <select id="year_level" name="year_level" class="Nrooms_txt" required>
                        <option value="" disabled>Select Year Level</option>
                        <option value="1Y" {{ old('year_level', $event->year_level) == '1Y' ? 'selected' : '' }}>1st year</option>
                        <option value="2Y" {{ old('year_level', $event->year_level) == '2Y' ? 'selected' : '' }}>2nd year</option>
                        <option value="3Y" {{ old('year_level', $event->year_level) == '3Y' ? 'selected' : '' }}>3rd year</option>
                        <option value="4Y" {{ old('year_level', $event->year_level) == '4Y' ? 'selected' : '' }}>4th year</option>
                    </select>
                    @error('year_level')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Block -->
                <div class="mb-3">
                    <label for="block" class="RnamelBl">Block:</label>
                    <select id="block" name="block" class="Nrooms_txt" required>
                        <option value="" disabled>Select Block</option>
                        <option value="B1" {{ old('block', $event->block) == 'B1' ? 'selected' : '' }}>Block 1</option>
                        <option value="B2" {{ old('block', $event->block) == 'B2' ? 'selected' : '' }}>Block 2</option>
                        <option value="B3" {{ old('block', $event->block) == 'B3' ? 'selected' : '' }}>Block 3</option>
                        <option value="B4" {{ old('block', $event->block) == 'B4' ? 'selected' : '' }}>Block 4</option>
                    </select>
                    @error('block')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Department -->
                <div class="mb-3">
                    <label for="department_id" class="RnamelBl">Department:</label>
                    <select id="department_id" name="department_id" class="Nrooms_txt" required>
                        <option value="" disabled>Select a department</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}" {{ old('department_id', $event->department_id) == $department->id ? 'selected' : '' }}>
                                {{ $department->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('department_id')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit and Back Buttons -->
                <div class="button-container-act">
                    <button type="submit" class="btn btn-primary">Update Event</button>
                    <a href="{{ route('attendance.events.list') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
