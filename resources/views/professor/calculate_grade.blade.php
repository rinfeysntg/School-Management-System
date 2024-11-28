<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate Grade</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('{{ asset('images/bg.png') }}') no-repeat center center fixed;
            background-size: cover;
        }

        .main-card {
            background: #405147;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 100%;
            max-width: 600px;
            text-align: center;
        }

        h1 {
            color: #fff;
            margin-bottom: 20px;
        }

        form {
            background: #c1ca98;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            text-align: left;
        }

        input {
            width: 95%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            color: white;
            background-color: #405147;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #218838;
        }

        .banner {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
            text-align: center;
        }

        .back-button {
            display: inline-block;
            padding: 10px 20px;
            color: white;
            background-color: #6c757d;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="main-card">
        <h1>Calculate Grade</h1>

        @if(session('success'))
            <div class="banner">{{ session('success') }}</div>
        @endif

        <form action="{{ route('professor.store_grade_breakdown') }}" method="POST">
            @csrf
            <label for="name">Student Name:</label>
            <input type="text" name="name" required autocomplete="off">

            <label for="attendance">Attendance Grade:</label>
            <input type="number" name="attendance" min="0" max="100" required>

            <label for="quizzes">Quiz Grade:</label>
            <input type="number" name="quizzes" min="0" max="100" required>

            <label for="assignments">Assignment Grade:</label>
            <input type="number" name="assignments" min="0" max="100" required>

            <label for="exams">Exam Grade:</label>
            <input type="number" name="exams" min="0" max="100" required>

            <button type="submit">Submit</button>
        </form>

        <a href="{{ route('professor.grade_breakdown') }}" class="back-button">Back to Grade Breakdown</a>
    </div>
</body>
</html>
