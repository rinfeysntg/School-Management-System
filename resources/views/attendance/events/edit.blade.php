@extends('layout')

@section('content')
    <div class="rec_dashboard" style="max-height: 400px; overflow-y: auto; padding: 10px;">
        <div class="logoDashboard"></div>
        <h1 class="registrarLbl">Edit Event</h1>

        <div class="form-container">
            <!-- Edit Event Form -->
            <form action="{{ route('attendance.events.update', $event->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="event_name" class="form-label">Event Name</label>
                    <input type="text" id="event_name" name="event_name" class="form-control" value="{{ old('event_name', $event->name) }}" required>
                </div>

                <div class="form-group">
                    <label for="event_date" class="form-label">Event Date</label>
                    <input type="date" id="event_date" name="event_date" class="form-control" value="{{ old('event_date', $event->event_date) }}" required>
                </div>

                <div class="form-group">
                    <label for="event_time" class="form-label">Event Time</label>
                    <input type="time" id="event_time" name="event_time" class="form-control" value="{{ old('event_time', $event->event_time) }}">
                </div>

                <div class="form-group">
                    <label for="course_id" class="form-label">Course</label>
                    <select id="course_id" name="course_id" class="form-control" required>
                        <option value="" disabled>Select a course</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}" {{ $event->course_id == $course->id ? 'selected' : '' }}>
                                {{ $course->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="year_level" class="form-label">Year Level</label>
                    <select id="year_level" name="year_level" class="form-control">
                        <option value="">Select Year Level</option>
                        <option value="1Y" {{ $event->year_level == '1Y' ? 'selected' : '' }}>1st year</option>
                        <option value="2Y" {{ $event->year_level == '2Y' ? 'selected' : '' }}>2nd year</option>
                        <option value="3Y" {{ $event->year_level == '3Y' ? 'selected' : '' }}>3rd year</option>
                        <option value="4Y" {{ $event->year_level == '4Y' ? 'selected' : '' }}>4th year</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="block" class="form-label">Block</label>
                    <select id="block" name="block" class="form-control">
                        <option value="">Select Block</option>
                        <option value="B1" {{ $event->block == 'B1' ? 'selected' : '' }}>Block 1</option>
                        <option value="B2" {{ $event->block == 'B2' ? 'selected' : '' }}>Block 2</option>
                        <option value="B3" {{ $event->block == 'B3' ? 'selected' : '' }}>Block 3</option>
                        <option value="B4" {{ $event->block == 'B4' ? 'selected' : '' }}>Block 4</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="department_id" class="form-label">Department</label>
                    <select id="department_id" name="department_id" class="form-control" required>
                        <option value="" disabled>Select a department</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}" {{ $event->department_id == $department->id ? 'selected' : '' }}>
                                {{ $department->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary create-btn">Update Event</button>
            </form>
        </div>

        <button onclick="window.location='{{ route('attendance.events.list') }}'" class="btn btn-secondary back-btn">Back</button>
    </div>
@endsection

@section('styles')
    <style>
        .form-container {
            margin: 20px;
            background: rgba(0, 0, 0, 0.5);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-family: 'Tiro Tamil', serif;
            font-size: 18px;
            color: white;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
        }

        .create-btn {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 12px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
        }

        .create-btn:hover {
            background-color: #45a049;
        }

        .back-btn {
            background-color: #555;
            border: none;
            color: white;
            padding: 12px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
            margin-top: 20px;
        }

        .back-btn:hover {
            background-color: #444;
        }
    </style>
@endsection
