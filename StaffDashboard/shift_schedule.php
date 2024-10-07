<?php
session_start();
include 'db_connection.php';

// Check if user is logged in
if (!isset($_SESSION['uid'])) {
    // Redirect to login page with an error message
    header("Location: login.php?error=not_logged_in");
    exit();
}

$user_id = $_SESSION['uid'];

// Prepared statement to prevent SQL injection, changing table name to staffattendance
$sql = "SELECT * FROM staffattendance WHERE user_id = ? ORDER BY date";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (!$result) {
    // Error handling if query fails
    echo "Error fetching shift schedule: " . mysqli_error($conn);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shift Schedule</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9; /* Light background */
            color: #333; /* Dark text for contrast */
            margin: 0;
            padding: 0;
        }

        /* Main Content Area */
        .main-content {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background-color:#e7ffe6; /* White background */
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .content-section {
            margin: 20px 0;
        }

        /* Heading Styles */
        h2 {
            text-align: center;
            font-size: 24px;
            color: #4CAF50; /* Light green for header */
            margin-bottom: 30px;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #f1f1f1;
            border-radius: 8px;
            overflow: hidden;
        }

        table thead {
            background-color: #4CAF50; /* Light green for table header */
        }

        table thead th {
            padding: 15px;
            font-size: 16px;
            font-weight: bold;
            color: #ffffff; /* White text in header */
            text-align: left;
            border-bottom: 2px solid #3e8e41;
        }

        table tbody tr {
            border-bottom: 1px solid #ddd;
        }

        table tbody tr:nth-child(even) {
            background-color: #e7ffe6; /* Very light green for even rows */
        }

        table tbody td {
            padding: 12px;
            color: #333;
        }

        table tbody td:first-child {
            font-weight: bold;
        }

        table tbody td[colspan='3'] {
            text-align: center;
            font-style: italic;
            color: #e74c3c; /* Red for 'No shifts scheduled' */
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            table thead {
                display: none;
            }

            table, table tbody, table tr, table td {
                display: block;
                width: 100%;
            }

            table tbody tr {
                margin-bottom: 15px;
                border: 1px solid #ddd;
            }

            table tbody td {
                padding: 10px;
                text-align: right;
                position: relative;
            }

            table tbody td::before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                font-weight: bold;
                text-transform: uppercase;
                color: #333;
            }
        }
    </style>
    <div class="main-content">
        <div class="content-section">
            <h2>Your Shift Schedule</h2>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Shift</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['shift']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['created_at']) . "</td>"; // Assuming 'created_at' stores time.
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No shifts scheduled</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
