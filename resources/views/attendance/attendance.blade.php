<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
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

            .btn {
                padding: 10px 20px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <!-- Main Dashboard Container -->
    <div class="rec_dashboard">
        <!-- Dashboard Header -->
        <div class="logoDashboard"></div>
        <h1 class="registrarLbl">Attendance</h1>

        <!-- Dashboard Buttons -->
        <div class="button-container">
            <button id="studentBtn" onclick="window.location='{{ route('student.dashboard') }}'" class="btn">
                Student Dashboard
            </button>
            <button id="teacherBtn" onclick="window.location='{{ route('teacher.dashboard') }}'" class="btn">
                Teacher Dashboard
            </button>
        </div>
    </div>
</body>
</html>
