<?php
session_start();
include 'db_connection.php';

// Assuming staff login validation was successful
$shift_id = 1; // You will replace this with actual shift ID logic or from the database
$_SESSION['shift_id'] = $shift_id; // Set shift_id in session

// Now, redirect the staff to the dashboard
header('Location: StaffDashboard/staffindex.html');
exit();

// Check if 'shift_id' is set in session
if (isset($_SESSION['shift_id'])) {
    $user_id = $_SESSION['shift_id'];
    $shift = 'Morning'; // Example shift logic
    echo "<h2>Your Current Shift: $shift</h2>";
} else {
    echo "Error: Shift ID not set in session.";
}

mysqli_close($conn);
?>
