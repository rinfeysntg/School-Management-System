<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    <style>
        body {
            position: relative;
            background-image: url('../images/bg.png');
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
            background-image: url('../images/rec.png');
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
            background-image: url('../images/logo.png');
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

        .createBldgLbl {
            font-size: 30px;
            color: white;
            text-align: center;
            margin-top: 20px;
        }

        .attendance-table-container {
            width: 100%;
            margin-top: 40px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 10px;
            margin-top: 10px;
        }

        table th, table td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            color: #333;
        }

        .btn {
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

        .btn:hover {
            background-color: #1E3A32;
            color: white;
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .button-container a {
            text-decoration: none;
        }

        .recgray2 {
            background-image: url('../images/recgray2.png');
            background-repeat: no-repeat;
            background-size: cover;
            padding: 40px;
            border-radius: 10px;
            margin-top: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .attendance-table {
            background-color: transparent;
            width: 100%;
        }

        .attendance-table td, .attendance-table th {
            text-align: center;
            padding: 15px;
            color: #333;
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

            .createBldgLbl {
                font-size: 24px;
            }

            table th, table td {
                padding: 8px 10px;
                font-size: 14px;
            }

            .btn {
                padding: 10px 20px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="rec_dashboard">
        <div class="logoDashboard"></div>
        <h1 class="registrarLbl">Professor Dashboard</h1>

        <!-- Attendance Management Section -->
        <div class="attendance-section">
            <h2 class="createBldgLbl">Manage Attendance</h2>
            <button onclick="window.location='{{ route('attendance.create') }}'" id="createBldgBtn" class="btn">Add Attendance</button>
        </div>

        <!-- Subject Filter Section -->
        <div class="attendance-filter">
            <form action="{{ route('teacher.dashboard') }}" method="GET">
                <select name="subject_id" id="subject_id" class="btn" style="padding: 12px;" onchange="this.form.submit()">
                    <option value="">Select Subject</option>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}" {{ request('subject_id') == $subject->id ? 'selected' : '' }}>{{ $subject->name }}</option>
                    @endforeach
                </select>
            </form>
        </div>

        <!-- Attendance Table Section -->
        <div class="attendance-table-container">
            <h2 class="createBldgLbl">Student Attendance</h2>
            <div class="recgray2">
                <table class="attendance-table">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($attendance as $attendanceRecord)
                            <tr>
                                <td>{{ $attendanceRecord->student->name }}</td>
                                <td>{{ $attendanceRecord->subject->name }}</td>
                                <td>{{ $attendanceRecord->status }}</td>
                                <td>{{ $attendanceRecord->date }}</td>
                                <td>
                                    <!-- Edit Button -->
                                    <a href="{{ route('attendance.edit', $attendanceRecord->id) }}" class="btn" style="background-color: #4CAF50; color: white;">
                                        Edit
                                    </a>
                                    
                                    <!-- Delete Button -->
                                    <form action="{{ route('attendance.destroy', $attendanceRecord->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn" style="background-color: #f44336; color: white;">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No attendance records found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="button-container">
            <a href="/professor" id="dashboardBtn" class="btn">Dashboard</a>
            <a href="/profile" id="profileBtn" class="btn">Profile</a>
        </div>
    </div>
</body>
</html>
