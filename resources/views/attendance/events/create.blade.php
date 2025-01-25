@extends('attendance.events.app') <!-- Extending your theme layout -->

@section('content')
    <!-- Main Content Section -->
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

                <button type="submit" class="btn create-btn">Create Event</button>
            </form>
        </div>

        <button onclick="window.location='{{ route('teacher.dashboard') }}'" class="btn back-btn">Back</button>
    </div>
@endsection

@section('styles')
    <style>
        body {
            position: relative;
            background-image: url('{{ asset('images/bg.png') }}');
            background-repeat: no-repeat;
            background-size: cover;
            width: 100vw;
            height: 100vh;
            margin: 0;
            font-family: "Tiro Tamil", serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .rec_dashboard {
            background-image: url('{{ asset('images/rec.png') }}');
            background-repeat: no-repeat;
            background-size: cover;
            width: 80%;
            max-width: 1200px;
            height: auto;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .logoDashboard {
            background-image: url('{{ asset('images/logo.png') }}');
            background-repeat: no-repeat;
            background-size: contain;
            width: 150px;
            height: 150px;
            margin-bottom: 20px;
        }

        .registrarLbl {
            text-align: center;
            font-size: 40px;
            color: white;
            margin-bottom: 30px;
        }

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
