<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Time</title>
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
</head>
<body>
    <div class="rec_dashboard">
        <div class="logoContainer">
            <div class="logoDashboard"></div>
        </div>

        <h1 class="registrarLbl">Log Your Time</h1>

        <!-- Success Message -->
        @if(session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        <!-- Validation Errors -->
        @if ($errors->any())
            <ul class="error-list">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="recgray2">
            <form action="{{ route('dtr.store') }}" method="POST">
                @csrf
                <label for="employee_id" class="registrarLbl">Employee ID:</label>
                <input type="text" name="employee_id" value="{{ old('employee_id') }}" required id="employee_id" class="form-input"><br>

                <!-- Date and Time will be automatically set -->
                <input type="hidden" name="date" value="{{ now()->toDateString() }}">
                <input type="hidden" name="time_in" value="{{ now()->toTimeString() }}">

                <!-- Submit Button -->
                <button type="submit" class="custom-btn save-btn">Save Record</button>
            </form>
        </div>
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
            height: 80%;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .logoContainer {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .logoDashboard {
            background-image: url('{{ asset('images/logo.png') }}');
            background-repeat: no-repeat;
            background-size: contain;
            width: 270px;
            height: 270px;
            margin: 10px;
        }

        .registrarLbl {
            text-align: center;
            font-family: "Tiro Tamil", serif;
            font-weight: 400;
            font-size: 30px;
            color: white;
            margin-bottom: 15px;
        }

        .recgray2 {
            background-image: url('{{ asset('images/recgray2.png') }}');
            background-repeat: no-repeat;
            background-size: cover;
            width: 100%;
            height: auto;
            padding: 20px;
            border-radius: 10px;
            box-sizing: border-box;
        }

        .form-input {
            width: 100%;
            max-width: 350px;
            padding: 8px 12px;
            margin: 8px 0;
            border: 2px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            background-color: #fff;
            transition: border-color 0.3s ease;
        }

        .form-input:focus {
            border-color: #1E3A32;
            outline: none;
            box-shadow: 0 0 5px rgba(30, 58, 50, 0.5);
        }

        .custom-btn {
            background-color: #1E3A32;
            color: white;
            padding: 12px 24px;
            border-radius: 5px;
            border: none;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
            max-width: 350px;
            display: block;
            margin: 20px auto;
        }

        .custom-btn:hover {
            background-color: #3A5D46;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #1E3A32;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</body>
</html>
