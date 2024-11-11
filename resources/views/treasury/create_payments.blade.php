@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Payment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 800px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
            background-color: #f9f9f9;
        }
        h1 {
            text-align: center;
        }
        .section {
            margin-bottom: 20px;
        }
        .section h2 {
            font-size: 1.2em;
        }
        .payment-section, .actions-section {
            display: flex;
            justify-content: space-around;
            margin: 10px 0;
        }
        .actions-section input {
            margin-right: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Create Payment</h1>
    <div class="section">
        <h2>1st Term 2024-25</h2>
        <p>Student Name: LEBRON, PAUL HENDRICK C</p>
        <p>Last Enrolled: 1st Term SY 2024 - 2025</p>
        <p>Course Enrolled: BMT - 2</p>
        <p>Status: PAID</p>
        <p>Prelim Payment: 1,000.00</p>
    </div>

    <form action="process_payment.php" method="POST">
        <div class="section payment-section">
            <label>
                Payment Schedule:
                <select name="schedule">
                    <option value="Prelim">Prelim</option>
                    <option value="Midterm">Midterm</option>
                    <option value="Finals">Finals</option>
                </select>
            </label>
            
            <label>
                Payable Balance:
                <input type="text" name="balance" placeholder="Amount">
            </label>
        </div>

        <div class="section actions-section">
            <input type="submit" name="pay_exact" value="Pay Exact Amount">
            <input type="submit" name="pay_variable" value="Pay Variable">
            <input type="submit" name="put_amount" value="Put Amount">
        </div>
    </form>

    <div class="section">
        <button onclick="window.location.href='statement.php'">View Statement</button>
        <button onclick="window.location.href='done.php'">Done</button>
    </div>

    <p>INSTRUCTION: Click on a State to Pay or pay Installments/Tuition Fee. Click on <strong>DONE</strong> to review DOCUMENT preview Payment transactions and remaining balance.</p>
</div>

</body>
</html>
