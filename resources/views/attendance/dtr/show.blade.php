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
        <h1>DTR Details</h1>
        <div>
            <p><strong>Employee:</strong> {{ $dtr->employee->name }}</p>
            <p><strong>Date:</strong> {{ $dtr->date }}</p>
            <p><strong>Time In:</strong> {{ $dtr->time_in }}</p>
            <p><strong>Time Out:</strong> {{ $dtr->time_out ?? 'N/A' }}</p>
        </div>
    </div>
</body>
</html>
