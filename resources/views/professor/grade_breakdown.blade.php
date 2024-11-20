<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Breakdown</title>
    <style>
        /* Background and body styling */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: url('{{ asset('images/bg.png') }}') no-repeat center center fixed;
            background-size: cover;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Main card styling */
        .main-card {
            background: rgba(69, 86, 65, 0.8);  /* Added transparency to improve readability on the background */
            border-radius: 10px;
            padding: 20px;
            width: 80%;
            max-width: 1200px;
            text-align: center;
        }

        /* Title styling */
        .main-card h1 {
            margin: 0;
            font-size: 2.5em;
            color: white;
        }

        /* Inner card styling */
        .inner-card {
            background: #ffffff;
            border-radius: 10px;
            padding: 15px;
            margin-top: 20px;
            max-height: 400px; /* Set maximum height for scroll */
            overflow-y: auto; /* Enable vertical scrolling */
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            text-align: left;
            color: #000;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
        }

        /* Banner styles */
        .success-banner {
            color: lightgreen;
            font-weight: bold;
        }

        .error-banner {
            color: lightcoral;
            font-weight: bold;
        }

        a {
            color: lightblue;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="main-card">
        <h1>Grade Breakdown</h1>

        <div class="inner-card">
            <!-- Display success message if applicable -->
            @if(session('success'))
                <div class="success-banner">{{ session('success') }}</div>
            @endif

            @if ($gradeBreakdowns->isEmpty())
                <p>No grade breakdowns available.</p>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Attendance (%)</th>
                            <th>Quizzes (%)</th>
                            <th>Assignments (%)</th>
                            <th>Exams (%)</th>
                            <th>Final Grade (%)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gradeBreakdowns as $gradeBreakdown)
                            <tr>
                                <td>{{ $gradeBreakdown->name }}</td>
                                <td>{{ $gradeBreakdown->attendance }}%</td>
                                <td>{{ $gradeBreakdown->quizzes }}%</td>
                                <td>{{ $gradeBreakdown->assignments }}%</td>
                                <td>{{ $gradeBreakdown->exams }}%</td>
                                <td>{{ $gradeBreakdown->final_grade }}%</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</body>
</html>
