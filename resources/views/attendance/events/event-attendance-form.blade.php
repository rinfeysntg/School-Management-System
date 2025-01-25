@extends('attendance.events.app') <!-- Extending your theme layout -->

@section('content')
    <!-- Main Content Section -->
    <div class="rec_dashboard">
        <div class="logoDashboard"></div>
        <h1 class="registrarLbl">Log Attendance for Event: {{ $event->name }}</h1>

        <div class="form-container">
            <!-- Attendance Log Form -->
            <form method="POST" action="{{ route('attendance.event.store', $event->id) }}">
                @csrf
                <div class="form-group">
                    <label for="student_id" class="form-label">Enter Your Student ID</label>
                    <input type="text" name="student_id" id="student_id" class="form-control" required>
                </div>

                <button type="submit" class="btn create-btn">Log Attendance</button>
            </form>
        </div>

        <button onclick="window.location='{{ route('teacher.dashboard') }}'" class="btn back-btn">Back</button>
    </div>
@endsection

@section('styles')
    <style>
        .rec_dashboard {
            padding: 30px;
            background: url('/path/to/rec.png') no-repeat center center fixed;
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

        .form-container {
            margin: 20px;
            background: rgba(0, 0, 0, 0.7); /* Semi-transparent background */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
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
            background-color: #BDCB95;
            color: black;
            padding: 12px 25px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin: 10px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .create-btn:hover {
            background-color: #1E3A32;
            color: white;
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

            .form-container {
                padding: 20px;
            }

            .create-btn {
                padding: 10px 20px;
                font-size: 14px;
            }

            .back-btn {
                padding: 10px 15px;
                font-size: 14px;
            }
        }
    </style>
@endsection
