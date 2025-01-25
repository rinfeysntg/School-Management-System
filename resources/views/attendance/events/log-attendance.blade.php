@extends('attendance.events.app') <!-- Updated layout file path -->

@section('content')
    <!-- Main Content Section -->
    <div class="rec_dashboard">
        <div class="logoDashboard"></div>
        <h1 class="event-name">{{ $event->name }}</h1>
        <p class="event-details"><strong>Date:</strong> {{ $event->event_date->format('F j, Y') }}</p>

        @if(auth()->user()->role === 'student')
            <!-- Attendance Form -->
            <div class="form-container">
                <form action="{{ route('attendance.event.attend', $event->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="attended_at" class="form-label">Attendance Time</label>
                        <input type="datetime-local" class="form-control" id="attended_at" name="attended_at" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Mark Attendance</button>
                </form>
            </div>
        @endif
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

        .event-name {
            font-size: 36px;
            color: white;
            font-family: 'Tiro Tamil', serif;
        }

        .event-details {
            font-size: 18px;
            color: white;
            font-family: 'Tiro Tamil', serif;
        }

        .form-container {
            margin-top: 20px;
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

        .btn {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 12px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
            margin-top: 10px;
        }

        .btn:hover {
            background-color: #45a049;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .rec_dashboard {
                width: 95%;
                padding: 20px;
            }

            .event-name {
                font-size: 28px;
            }

            .form-container {
                padding: 20px;
            }

            .form-control {
                padding: 8px;
                font-size: 14px;
            }

            .btn {
                padding: 10px 15px;
                font-size: 14px;
            }
        }
    </style>
@endsection
