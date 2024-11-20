<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Calculator</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-image: url('{{ asset('images/bg.png') }}'); /* Add your background image here */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .card {
            width: 90%;
            max-width: 1500px;
            height: 700px;
            background-color: #273e2c;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 60px 70px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .left-section {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .header {
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 25px;
            color: #ffffff;
        }

        .button-group {
            margin-top: 30px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            width: 100%;
        }

        .button-group button {
            padding: 15px 25px;
            border: none;
            border-radius: 10px;
            background-color: #BDCB95;
            color: #000000;
            cursor: pointer;
            font-size: 16px;
        }

        .button-group button:hover {
            background-color: #425947;
        }

        .logo {
            width: 500px;
            height: 500px;
            align-self: flex-end;
            margin-bottom: 20px;
            margin-right: 20px;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="left-section">
            <div class="header">Grade Calculator</div>
            <div class="button-group">
                <button onclick="window.location='{{ route('professor.calculate_grade') }}'">Calculate Grade</button>
                <button onclick="window.location='{{ route('professor.grade_breakdown') }}'">Grade Breakdown</button>
            </div>
        </div>

        <img src="{{ asset('images/wuplogo.png') }}" alt="Logo" class="logo">
    </div>  
</body>
</html>
