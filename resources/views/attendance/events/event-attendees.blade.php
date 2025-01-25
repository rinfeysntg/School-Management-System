@extends('attendance.events.app') <!-- Extending your theme layout -->

@section('content')
    <!-- Main Content Section -->
    <div class="rec_dashboard">
        <div class="logoDashboard"></div>
        <h1 class="registrarLbl">Attendees for Event: {{ $event->name }}</h1>

        <!-- Attendees Table -->
        <div class="table-container">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Time Attended</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($event->attendees as $attendance)
                        <tr>
                            <td>{{ $attendance->student_id }}</td>
                            <td>{{ $attendance->student->name }}</td>
                            <td>{{ $attendance->attended_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <button onclick="window.location='{{ route('teacher.dashboard') }}'" class="btn back-btn">Back</button>
    </div>
@endsection

@section('styles')
    <style>
        .table-container {
            margin: 20px;
            background: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
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

            .back-btn {
                padding: 10px 15px;
                font-size: 14px;
            }
        }
    </style>
@endsection
