<?php
session_start();
include 'db_connection.php';

// Check if user_id is set in session
if (!isset($_SESSION['uid'])) {
    echo "<div class='error'>Error: User not logged in</div>";
    exit();
}

$user_id = $_SESSION['uid'];

// Check if user_id exists in the user table
$check_user = "SELECT * FROM user WHERE uid='$user_id'";
$user_result = mysqli_query($conn, $check_user);

if (mysqli_num_rows($user_result) > 0) {
    // User exists, proceed with marking attendance
    $shift = 'Morning'; // Adjust based on time
    $present = 1; // Present

    // Insert attendance record for today
    $date = date('Y-m-d');
    $sql = "INSERT INTO staffattendance (user_id, date, shift, present) 
            VALUES ('$user_id', '$date', '$shift', '$present') 
            ON DUPLICATE KEY UPDATE present='$present'";

    if (mysqli_query($conn, $sql)) {
        echo "<div class='success'>Attendance marked successfully!</div>";
    } else {
        echo "<div class='error'>Error: " . mysqli_error($conn) . "</div>";
    }
} else {
    // user_id does not exist
    echo "<div class='error'>Error: User not found.</div>";
}

mysqli_close($conn);
?>

<!-- Add this CSS in your <head> section or a separate CSS file -->
<style>
    .success {
        color: #4CAF50; /* Green color for success */
        background-color: #f0fff0; /* Light green background */
        border: 1px solid #4CAF50; /* Green border */
        padding: 15px;
        margin: 20px 0;
        border-radius: 5px;
        font-weight: bold;
        text-align: center;
        transition: all 0.3s ease;
    }
    
    .success:hover {
        background-color: #d9f7d9; /* Darker green on hover */
    }

    .error {
        color: #f44336; /* Red color for error */
        background-color: #ffebee; /* Light red background */
        border: 1px solid #f44336; /* Red border */
        padding: 15px;
        margin: 20px 0;
        border-radius: 5px;
        font-weight: bold;
        text-align: center;
        transition: all 0.3s ease;
    }

    .error:hover {
        background-color: #ffcdd2; /* Darker red on hover */
    }
</style>
