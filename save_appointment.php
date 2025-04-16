<?php
include 'db.php'; // your DB connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $service = $_POST['service'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $contact = $_POST['contact'];

    $sql = "INSERT INTO appointments (service, date, time, contact) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $service, $date, $time, $contact);

    if ($stmt->execute()) {
        // Show receipt
        echo "
        <h2>✅ Appointment Booked Successfully!</h2>
        <div style='border:1px solid #000; padding:20px; width:300px; margin:auto; text-align:left;'>
            <h3>📄 Receipt</h3>
            <p><strong>Service:</strong> $service</p>
            <p><strong>Date:</strong> $date</p>
            <p><strong>Time:</strong> $time</p>
            <p><strong>Contact:</strong> $contact</p>
            <button onclick='window.print()'>🖨️ Print Receipt</button>
        </div>";
    } else {
        echo "❌ Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
