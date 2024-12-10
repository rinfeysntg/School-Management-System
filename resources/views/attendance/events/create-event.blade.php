@extends('layout')

@section('content')
    <div class="rec_dashboard" style="max-height: 400px; overflow-y: auto; padding: 10px;">
        <div class="logoDashboard"></div>
        <h1 class="registrarLbl">Create New Event</h1>

        <div class="form-container">
            <!-- Create Event Form -->
            <form action="{{ route('attendance.events.store') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="event_name" class="form-label">Event Name</label>
                    <input type="text" id="event_name" name="event_name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="event_date" class="form-label">Event Date</label>
                    <input type="date" id="event_date" name="event_date" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="event_time" class="form-label">Event Time</label>
                    <input type="time" id="event_time" name="event_time" class="form-control">
                </div>

                <div class="form-group">
                    <label for="course_id" class="form-label">Course</label>
                    <select id="course_id" name="course_id" class="form-control" required>
                        <option value="" disabled selected>Select a course</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                        <label for="year_level">Year Level</label>
                        <select class="form-control" name="year_level">
                            <option value="">Select Year Level</option>
                            <option value="1Y">1st year</option>
                            <option value="2Y">2nd year</option>
                            <option value="3Y">3rd year</option>
                            <option value="4Y">4th year</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="block">Block</label>
                        <select class="form-control" name="block">
                        <option value="">Select Block</option>
                        <option value="B1">Block 1</option>
                        <option value="B2">Block 2</option>
                        <option value="B3">Block 3</option>
                        <option value="B4">Block 4</option>
                        </select>    
                    </div>

                <div class="form-group">
                    <label for="department_id" class="form-label">Department</label>
                    <select id="department_id" name="department_id" class="form-control" required>
                        <option value="" disabled selected>Select a department</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary create-btn">Create Event</button>
            </form>
        </div>

        <button onclick="window.location='{{ route('teacher.dashboard') }}'" class="btn btn-secondary back-btn">Back</button>
    </div>
@endsection

@section('styles')
    <style>
        .form-container {
            margin: 20px;
            background: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
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
