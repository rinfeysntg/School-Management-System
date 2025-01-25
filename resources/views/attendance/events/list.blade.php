@extends('attendance.events.app') <!-- Updated layout file path -->

@section('content')
    <!-- Main Content Section -->
    <div class="rec_dashboard">
        <div class="logoDashboard"></div>
        <h1 class="registrarLbl">List of Events</h1>
        
        @if($events->isEmpty())
            <div class="alert alert-info">
                No events found. <a href="{{ route('attendance.events.create') }}" class="alert-link">Create an event</a> to get started!
            </div>
        @else
            <!-- Events Table -->
            <div class="table-container">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Event Name</th>
                            <th>Event Date</th>
                            <th>Event Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                            <tr>
                                <td>{{ $event->name }}</td>
                                <td>{{ $event->event_date ? $event->event_date->format('F j, Y') : 'Not Set' }}</td>
                                <td>{{ $event->event_time ? $event->event_time->format('H:i') : 'Not Set' }}</td>
                                <td>
                                    <!-- View Attendees -->
                                    <a href="{{ route('attendance.event.attendees', $event->id) }}" class="btn btn-sm btn-primary">View Attendees</a>
                                    
                                    <!-- Edit Event -->
                                    <a href="{{ route('attendance.events.edit', $event->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                                    
                                    <!-- Delete Event -->
                                    <form action="{{ route('attendance.events.destroy', $event->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination Links -->
                <div class="d-flex justify-content-center">
                    {{ $events->links() }}
                </div>
            </div>
        @endif
    </div>
@endsection

@section('styles')
    <style>
        .rec_dashboard {
            padding: 30px;
            background: url('/path/to/bg.png') no-repeat center center fixed;
            background-size: cover;
        }

        .logoDashboard {
            background-image: url('/path/to/logo.png');
            width: 150px;
            height: 150px;
            background-size: contain;
            margin-bottom: 20px;
        }

        .registrarLbl {
            font-size: 36px;
            font-family: 'Tiro Tamil', serif;
            color: #BDCB95;
        }

        .table-container {
            margin: 20px;
            background: rgba(0, 0, 0, 0.7); /* Semi-transparent background */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
            font-family: 'Tiro Tamil', serif;
            color: white;
        }

        th {
            background-color: #BDCB95;
        }

        tr:nth-child(even) {
            background-color: #1E3A32;
        }

        tr:hover {
            background-color: #3a4d3e;
        }

        .btn {
            border-radius: 5px;
            margin: 5px;
            padding: 10px 20px;
            font-family: 'Tiro Tamil', serif;
        }

        .btn-primary {
            background-color: #3a4d3e;
            color: white;
        }

        .btn-primary:hover {
            background-color: #2b3a29;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .alert-info {
            background-color: #1E3A32;
            color: white;
            font-family: 'Tiro Tamil', serif;
        }

        .alert-link {
            color: #BDCB95;
        }

        /* Pagination Styles */
        .pagination {
            background-color: #1E3A32;
            color: white;
        }

        .pagination li a {
            color: white;
        }

        .pagination li a:hover {
            background-color: #BDCB95;
            color: black;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .rec_dashboard {
                width: 95%;
                padding: 20px;
            }

            .logoDashboard {
                width: 120px;
                height: 120px;
            }

            .registrarLbl {
                font-size: 30px;
            }

            .table-container {
                padding: 20px;
            }

            .btn {
                padding: 8px 15px;
                font-size: 14px;
            }
        }
    </style>
@endsection
