<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DTR Records</title>
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
</head>
<body>
    <div class="rec_dashboard">
        <!-- Logo Section -->
        <div class="logoContainer">
            <div class="logoDashboard"></div>
        </div>
        <h1 class="registrarLbl">DTR Records</h1>

        <!-- DTR Table Section -->
        <div class="recgray2">
            <table>
                <thead>
                    <tr>
                        <th>Employee Name</th>
                        <th>Date</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dtrs as $dtr)
                        <tr>
                            <td>{{ $dtr->employee->name }}</td>
                            <td>{{ $dtr->date }}</td>
                            <td>{{ $dtr->time_in }}</td>
                            <td>{{ $dtr->time_out ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('dtr.show', $dtr->id) }}" class="actionBtn">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Back Button -->
        <button id="logoutBtn" onclick="window.location='{{ route('dtr.form') }}'">Back</button>

    </div>

    <style>
        body {
            position: relative;
            background-image: url('../images/bg.png');
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
            background-image: url('../images/rec.png');
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
            background-image: url('../images/logo.png');
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
            font-size: 40px;
            color: white;
            margin-bottom: 20px;
        }

        .recgray2 {
            background-image: url('../images/recgray2.png');
            background-repeat: no-repeat;
            background-size: cover;
            width: 100%;
            height: auto;
            padding: 20px;
            border-radius: 10px;
            box-sizing: border-box;
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

        .actionBtn {
            text-decoration: none;
            background-color: #BDCB95;
            color: black;
            padding: 8px 16px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .actionBtn:hover {
            background-color: #1E3A32;
            color: white;
        }

        #logoutBtn {
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

        #logoutBtn:hover {
            background-color: #5c3e3e;
        }
    </style>
</body>
</html>
