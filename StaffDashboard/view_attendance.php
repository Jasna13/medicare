<?php
session_start();
include 'db_connection.php';

// Fetch the logged-in user's attendance records
$user_id = $_SESSION['uid'];
$sql = "SELECT * FROM staffattendance WHERE user_id='$user_id' ORDER BY date DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Records</title>
    <style>
        body {
            background-color:#d9f7d9; /* Soft background color */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Modern font */
            margin: 0;
            padding: 20px;
            color: #333; /* Dark text color for readability */
        }

        h1 {
            text-align: center;
            color: green; /* Blue color for the heading */
            margin-bottom: 20px;
            font-weight: 600; /* Semi-bold */
        }

        .attendance-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px;
        }

        .attendance-record {
    background-color: #ffffff; /* White background for each record */
    border-radius: 10px;
    padding: 20px;
    margin: 10px 0;
    width: 90%; /* Width of the record box */
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Deeper shadow for depth */
    transition: transform 0.3s, box-shadow 0.3s; /* Smooth scaling and shadow change on hover */
    border-left: 5px solid #4caf50; /* Change left border color to green */
}


        .attendance-record:hover {
            transform: translateY(-5px); /* Slight lift on hover */
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2); /* Stronger shadow on hover */
        }

        .no-records {
            color: #f44336; /* Red color for no records found */
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
        }

        p {
            margin: 10px 0; /* Margin for paragraph elements */
            line-height: 1.5; /* Improved line height for readability */
        }

        strong {
            color: green; /* Strong color for emphasis */
        }
    </style>
</head>
<body>

<h1>Your Attendance Records</h1>

<?php
if (mysqli_num_rows($result) > 0) {
    echo "<div class='attendance-container'>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='attendance-record'>";
        echo "<p><strong>Date:</strong> " . $row['date'] . "</p>";
        echo "<p><strong>Shift:</strong> " . $row['shift'] . "</p>";
        echo "<p><strong>Status:</strong> " . ($row['present'] ? 'Present' : 'Absent') . "</p>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "<div class='no-records'>No attendance records found.</div>";
}

mysqli_close($conn);
?>

</body>
</html>
