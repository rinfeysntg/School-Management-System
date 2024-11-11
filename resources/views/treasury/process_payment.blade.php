<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $schedule = $_POST['schedule'];
    $balance = $_POST['balance'];

    if (isset($_POST['pay_exact'])) {
        echo "Processing exact payment for $schedule with balance of $balance.";
    } elseif (isset($_POST['pay_variable'])) {
        echo "Processing variable payment for $schedule.";
    } elseif (isset($_POST['put_amount'])) {
        echo "Putting custom amount for $schedule.";
    }
}
?>
