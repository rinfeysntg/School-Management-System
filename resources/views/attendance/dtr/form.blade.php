<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Time</title>
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}"> <!-- Link to your CSS file -->
</head>
<body>
    <!-- Dashboard Section -->
    <div class="rec_dashboard">
        <!-- Logo Section -->
        <div class="logoContainer">
            <div class="logoDashboard"></div> <!-- Logo from your CSS -->
        </div>

        <!-- Title Section -->
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

        <!-- Form Section for DTR -->
        <div class="recgray2">
            <form action="{{ route('dtr.store') }}" method="POST">
                @csrf
                <label for="employee_id" class="registrarLbl">Employee ID:</label>
                <input type="text" name="employee_id" value="{{ old('employee_id') }}" required id="bldgName" class="form-input"><br>

                {{-- <label for="date" class="registrarLbl">Date:</label>
                <input type="date" name="date" value="{{ old('date') }}" required id="bldgDesc" class="form-input"><br>

                <label for="time_in" class="registrarLbl">Time In:</label>
                <input type="time" name="time_in" value="{{ old('time_in') }}" required id="bldgName" class="form-input"><br>

                <label for="time_out" class="registrarLbl">Time Out:</label>
                <input type="time" name="time_out" value="{{ old('time_out') }}" id="bldgDesc" class="form-input"><br> --}}

                <!-- Submit Button (Save Record) -->
                <button type="submit" class="custom-btn save-btn">Save Record</button>
            </form>
        </div>
    </div>

    <!-- Inline CSS -->
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
            font-size: 30px; /* Reduced font size for a more balanced look */
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

        /* Styling for Smaller Input Fields */
        .form-input {
            width: 100%;
            max-width: 350px; /* Set a max width for better control */
            padding: 8px 12px; /* Reduced padding */
            margin: 8px 0; /* Reduced margin for less space between fields */
            border: 2px solid #ccc;
            border-radius: 5px;
            font-size: 14px; /* Smaller font size */
            background-color: #fff;
            transition: border-color 0.3s ease;
        }

        /* Focus Effect */
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
