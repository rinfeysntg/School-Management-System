<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
</head>
<body>
    <div class="rec_dashboard">
        <h1 class="registrarLbl">Attendance</h1>
        <button id="studentBtn" onclick="window.location='{{ route('student.dashboard') }}'">Student Dashboard</button>
        <button id="teacherBtn" onclick="window.location='{{ route('teacher.dashboard') }}'">Teacher Dashboard</button>
    </div>
</body>
</html>


