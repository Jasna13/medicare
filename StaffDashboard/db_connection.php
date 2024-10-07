<?php
// Database connection
$host = 'localhost';
$db = 'medico_shop';
$user = 'root'; // Change to your DB username
$pass = 'root'; // Change to your DB password

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>