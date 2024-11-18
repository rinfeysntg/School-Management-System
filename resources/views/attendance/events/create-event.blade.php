@extends('layout') <!-- Assuming layout is already set to work -->

@section('content') <!-- Section to inject into layout -->
    <div class="rec_dashboard">
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
                    <input type="time" id="event_time" name="event_time" class="form-control" required>
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
