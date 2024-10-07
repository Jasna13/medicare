<?php
session_start(); // Start the session at the top of the file
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="dashboard-container">
        <div class="sidebar">
            <h2>Staff Dashboard</h2>
            <ul>
                <li><a href="mark_attendance.php">Mark Attendance</a></li>
                <li><a href="view_attendance.php">View Attendance</a></li>
                <li><a href="view_orders.php">Manage Orders</a></li>
                <li><a href="shift_schedule.php">Shift Schedule</a></li> <!-- Link to shift schedule -->
                <li><a href="profile.php">Profile</a></li> <!-- Link to profile -->
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>

        <div class="main-content">
        <div class="header">
            <!-- Fetching and displaying the staff name -->
            <h1>Welcome, 
                <?php 
                    echo isset($_SESSION['name']) ? htmlspecialchars($_SESSION['name']) : 'Staff'; 
                ?>
            </h1>
            <p>Today's Date: <?php echo date('Y-m-d'); ?></p>
        </div>

            <div class="content-section">
                <div class="attendance-section">
                    <h2>Mark Attendance</h2>
                    <form action="mark_attendance.php" method="POST">
                        <button type="submit">Mark as Present</button>
                    </form>
                </div>

                <div class="orders-section">
                    <h2>Manage Orders</h2>
                    <a href="view_orders.php" class="button">View and Update Orders</a>
                </div>

                <div class="shift-section">
                    <h2>Shift Information</h2>
                    <a href="shift_schedule.php" class="button">Shift Schedule</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
