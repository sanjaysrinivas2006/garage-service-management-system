<?php
$servername = "localhost";
$username = "root";
$password = ""; // Set your MySQL password here
$dbname = "ESCOBAR_GARAGE";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
