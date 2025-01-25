@extends('attendance.events.app') <!-- Updated layout file path -->

@section('content')
    <!-- Main Content Section -->
    <div class="rec_dashboard">
        <h1 class="my-4 event-header">Your Events</h1>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Create Event Link -->
        <a href="{{ route('events.create') }}" class="btn btn-primary create-event-btn">Create New Event</a>

        <!-- Events Table -->
        <table class="table table-bordered table-hover mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>Event Name</th>
                    <th>Event Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{ $event->name }}</td>
                        <td>{{ $event->event_date->format('F j, Y') }}</td>
                        <td>
                            <a href="{{ route('events.attendees', $event->id) }}" class="btn btn-sm btn-primary">View Attendees</a> |
                            <a href="{{ route('events.attendance', $event->id) }}" class="btn btn-sm btn-success">Log Attendance</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('styles')
    <style>
        .rec_dashboard {
            padding: 20px;
            background: rgba(0, 0, 0, 0.6); /* Semi-transparent background */
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .event-header {
            font-size: 36px;
            color: white;
            font-family: 'Tiro Tamil', serif;
        }

        .alert-success {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border-radius: 5px;
        }

        .create-event-btn {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 12px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
            margin-top: 20px;
        }

        .create-event-btn:hover {
            background-color: #45a049;
        }

        .table {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
        }

        .thead-dark th {
            background-color: #333;
            color: white;
            font-family: 'Tiro Tamil', serif;
        }

        .btn {
            border-radius: 5px;
            text-decoration: none;
        }

        .btn:hover {
            opacity: 0.8;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .rec_dashboard {
                width: 95%;
                padding: 20px;
            }

            .event-header {
                font-size: 28px;
            }

            .table th, .table td {
                font-size: 14px;
            }

            .btn {
                font-size: 14px;
                padding: 8px 15px;
            }
        }
    </style>
@endsection
