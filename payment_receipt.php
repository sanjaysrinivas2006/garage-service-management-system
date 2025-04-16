<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pin_code = $_POST['pin_code'];
    $card_name = $_POST['card_name'];
    $card_number = $_POST['card_number'];
    $exp_month = $_POST['exp_month'];
    $exp_year = $_POST['exp_year'];
    $cvv = $_POST['cvv'];
    $service = $_POST['service'];
    $amount = $_POST['amount'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Receipt</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            padding: 20px;
            background-color:#20242d;
        }
        .receipt-container {
            background-color: #fff;
            padding: 30px;
            margin: 30px auto;
            border-radius: 8px;
            width: 70%;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        .receipt-container h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        .receipt-container .details p {
            font-size: 18px;
            margin: 5px 0;
        }
        .receipt-container .details strong {
            color: #2c3e50;
        }
        .print-btn {
            display: block;
            width: 100%;
            text-align: center;
            margin-top: 30px;
            padding: 10px;
            background-color: #27ae60;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }
        .print-btn:hover {
            background-color: #2ecc71;
        }
        @media print {
            .print-btn {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="receipt-container">
    <h2>Escobar Garage - Payment Receipt</h2>

    <div class="details">
        <p><strong>Full Name:</strong> <?= htmlspecialchars($full_name) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
        <p><strong>Address:</strong> <?= htmlspecialchars($address) ?></p>
        <p><strong>City:</strong> <?= htmlspecialchars($city) ?></p>
        <p><strong>State:</strong> <?= htmlspecialchars($state) ?></p>
        <p><strong>Pin Code:</strong> <?= htmlspecialchars($pin_code) ?></p>

        <h3>Payment Info</h3>
        <p><strong>Name on Card:</strong> <?= htmlspecialchars($card_name) ?></p>
        <p><strong>Card Number:</strong> **** **** **** <?= substr($card_number, -4) ?></p>
        <p><strong>Expiry:</strong> <?= htmlspecialchars($exp_month) ?>/<?= htmlspecialchars($exp_year) ?></p>
        <p><strong>CVV:</strong> ***</p>
        <p><strong>service</strong> <?= htmlspecialchars($service) ?></p>
        <p><strong>amount:</strong> <?= htmlspecialchars($amount) ?></p>
    </div>

    <button class="print-btn" onclick="window.print()">Print Receipt</button>
</div>

</body>
</html>
