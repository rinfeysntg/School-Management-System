<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DTR Details</title>
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
</head>
<body>
    <div class="rec_dashboard">
        <!-- Title Section -->
        <h1 class="registrarLbl">DTR Details</h1>

        <!-- DTR Details Section -->
        <div class="recgray2">
            <p><strong>Employee:</strong> {{ $dtr->employee->name }}</p>
            <p><strong>Date:</strong> {{ $dtr->date }}</p>
            <p><strong>Time In:</strong> {{ $dtr->time_in }}</p>
            <p><strong>Time Out:</strong> {{ $dtr->time_out ?? 'N/A' }}</p>
        </div>

        <!-- Back Button -->
        <button id="backBtn" onclick="window.location='{{ route('dtr.index') }}'">Back</button>
    </div>

    <style>
        body {
            position: relative;
            background-image: url('{{ asset('images/bg.png') }}');
            background-repeat: no-repeat;
            background-size: cover;
            width: 100vw;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            color: white; /* Ensures text is visible on the background */
        }

        .rec_dashboard {
            position: absolute;
            top: 10%;
            left: 50%;
            transform: translateX(-50%);
            background-image: url('{{ asset('images/rec.png') }}');
            background-repeat: no-repeat;
            background-size: cover;
            width: 80%;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: rgba(0, 0, 0, 0.5); /* Makes the background slightly darker for contrast */
        }

        .registrarLbl {
            text-align: center;
            font-family: "Tiro Tamil", serif;
            font-weight: 400;
            font-size: 40px;
            margin-bottom: 20px;
        }

        .recgray2 {
            background-image: url('{{ asset('images/recgray2.png') }}');
            background-repeat: no-repeat;
            background-size: cover;
            padding: 20px;
            border-radius: 10px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            margin-bottom: 10px;
        }

        #backBtn {
            background-color: #A87979;
            color: white;
            width: 200px;
            padding: 10px;
            border-radius: 5px;
            border: none;
            transition: background-color 0.3s;
            display: block;
            margin: 20px auto;
        }

        #backBtn:hover {
            background-color: #5c3e3e;
        }
    </style>
</body>
</html>
