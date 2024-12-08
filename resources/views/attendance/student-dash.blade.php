<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <style>
        /* General Layout */
        body {
            margin: 0;
            padding: 0;
            background-image: url('../images/bg.png');
            background-size: cover;  /* Ensure background covers the entire screen */
            background-position: top center;  /* Position the background image properly */
            background-attachment: fixed;  /* Make sure the background doesn't scroll */
            height: 100vh;  /* Full viewport height */
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
        }

        /* Dashboard Container */
        .rec_dashboard {
            padding: 30px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            height: 100%;
            width: 100%;
            position: relative;
            z-index: 1; /* Ensures content stays above background */
        }

        /* Position Logo in the Top Right Corner */
        .logoDashboard {
            position: absolute;
            top: 20px;
            right: 20px; /* Logo is placed in the top-right corner */
            background-image: url('../images/logo.png');
            background-repeat: no-repeat;
            background-size: contain;
            width: 150px;
            height: 150px;
            z-index: 10; /* Ensures logo stays above content */
        }

        /* Attendance Summary Section */
        .attendance-summary-section {
            display: flex;
            justify-content: space-between;
            gap: 30px;
            flex-wrap: wrap;
            margin-bottom: 40px;
        }

        .attendance-summary {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
            width: 100%;
            margin-bottom: 40px;
        }

        .summary-item {
            background-color: rgba(255, 255, 255, 0.8); /* Slight transparency */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            flex: 1 1 calc(25% - 20px);
            text-align: center;
            margin: 10px;
        }

        .summary-item h3 {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
        }

        .summary-number {
            font-size: 24px;
            font-weight: bold;
            color: #2196F3;
        }

        /* Attendance Table */
        .attendance-table-container {
            background-color: rgba(255, 255, 255, 0.8); /* Slight transparency */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
            width: 80%;
            max-width: 900px;
            overflow-x: auto; 
            max-height:400px;
        }

        .attendance-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            text-align: center;
            table-layout: fixed; 
        }

        .attendance-table td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        /* Button Container */
        .button-container {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 40px;
        }

        /* Styled Buttons */
        .btn {
            background-color: #2196F3;
            padding: 15px 30px;
            text-decoration: none;
            color: white;
            font-size: 18px;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn:hover {
            background-color: #1E3A32;
        }

        /* Flex Layout for Full-Screen Landscape */
        .attendance-summary, .button-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        @media (max-width: 1024px) {
            .summary-item {
                flex: 1 1 48%;
            }
        }

        @media (max-width: 768px) {
            .attendance-summary {
                flex-direction: column;
            }

            .summary-item {
                flex: 1 1 100%;
                margin-bottom: 20px;
            }

            .button-container {
                flex-direction: column;
            }

            .btn {
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>

    <!-- Main Dashboard Container -->
    <div class="rec_dashboard">

        <!-- Logo at Top Right -->
        <div class="logoDashboard"></div>

        <!-- Attendance Summary Section -->
        <div class="attendance-summary-section">
            <div class="attendance-summary">
                <!-- Total Attendance -->
                <div class="summary-item">
                    <h3>Total Attendance</h3>
                    <p class="summary-number">{{ $total }}</p>
                </div>
                <!-- Present Attendance -->
                <div class="summary-item">
                    <h3>Present</h3>
                    <p class="summary-number" style="color: #4CAF50;">{{ $present }}</p>
                </div>
                <!-- Absent Attendance -->
                <div class="summary-item">
                    <h3>Absent</h3>
                    <p class="summary-number" style="color: #F44336;">{{ $absent }}</p>
                </div>
                <!-- Late Attendance -->
                <div class="summary-item">
                    <h3>Late</h3>
                    <p class="summary-number" style="color: #FF9800;">{{ $late }}</p>
                </div>
            </div>
        </div>

        <!-- Attendance Table -->
        <div class="attendance-table-container">
            <table class="attendance-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Subject</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($attendance as $att)
                        <tr>
                            <td>{{ $att->date }}</td>
                            <td>{{ $att->subject->name }}</td>
                            <td>{{ $att->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Dashboard Navigation Buttons -->
        <div class="button-container">
            <a href="/students" class="btn">Dashboard</a>
        </div>

    </div>

</body>
</html>
