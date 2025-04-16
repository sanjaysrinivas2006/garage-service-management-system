<?php
// Check if required parameters exist
$service = isset($_GET['service']) ? htmlspecialchars($_GET['service']) : 'N/A';
$date = isset($_GET['date']) ? htmlspecialchars($_GET['date']) : 'N/A';
$time = isset($_GET['time']) ? htmlspecialchars($_GET['time']) : 'N/A';
$contact = isset($_GET['contact']) ? htmlspecialchars($_GET['contact']) : 'N/A';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Appointment Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            text-align: center;
        }
        .receipt-box {
            border: 2px dashed #333;
            padding: 20px;
            width: 400px;
            margin: 0 auto;
        }
        h2 {
            margin-bottom: 20px;
        }
        p {
            font-size: 18px;
            margin: 8px 0;
        }
        button {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
        }
    </style>
</head>
<body>

<div class="receipt-box">
    <h2>Escobar Garage - Appointment Receipt</h2>
    <p><strong>Service:</strong> <?= $service ?></p>
    <p><strong>Date:</strong> <?= $date ?></p>
    <p><strong>Time:</strong> <?= $time ?></p>
    <p><strong>Contact:</strong> <?= $contact ?></p>

    <button onclick="window.print()">Print Receipt</button>
</div>

</body>
</html>
