<!-- resources/views/treasury_dashboard.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Treasury/Payment Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Link to your CSS file -->
    <style>
        /* Add custom styles if needed */
        .dashboard-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
        }
        .button-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .dashboard-button {
            padding: 15px 30px;
            font-size: 18px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            width: 200px;
            transition: background-color 0.3s;
        }
        .dashboard-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h1>Treasury/Payment Dashboard</h1>
        <div class="button-container">
            <a href="{{ route('create.payment') }}" class="dashboard-button">Create Payment</a>
            <a href="{{ route('tuition.payments') }}" class="dashboard-button">Tuition Payments</a>
            <a href="{{ route('user.accounts') }}" class="dashboard-button">User Accounts</a>
            <a href="{{ route('financial.analytics') }}" class="dashboard-button">Financial Analytics</a>
        </div>
    </div>
</body>
</html>
