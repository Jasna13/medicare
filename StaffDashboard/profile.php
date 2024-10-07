<?php
session_start();
include 'db_connection.php';

// Check if user is logged in
if (!isset($_SESSION['uid'])) {
    echo "Error: User not logged in";
    exit();
}

$user_id = $_SESSION['uid'];

// Fetch user profile data
$sql = "SELECT * FROM user WHERE uid = '$user_id'";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    $username = $row['username'];
    $email = $row['email'];
    $phone_number = $row['phone_number'];
    $position = $row['position'];
} else {
    echo "Error: User profile not found";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <style>
        /* General Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #d7f9d7; /* Light green background */
            color: #2e7d32; /* Dark green text for contrast */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full viewport height */
            background-image: linear-gradient(to bottom right, #d7f9d7, #c8e6c9); /* Subtle gradient */
        }

        /* Main Content Area */
        .main-content {
            max-width: 600px;
            padding: 30px;
            background-color: #ffffff; /* White background */
            border-radius: 12px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .main-content:hover {
            transform: translateY(-5px); /* Lift effect on hover */
        }

        .content-section {
            margin: 20px 0;
        }

        /* Heading Styles */
        h2 {
            text-align: center;
            font-size: 32px;
            color: #388e3c; /* Darker green color for header */
            margin-bottom: 20px;
            text-transform: uppercase; /* Uppercase heading */
            letter-spacing: 1px; /* Letter spacing for style */
        }

        /* Paragraph Styles */
        p {
            font-size: 18px;
            line-height: 1.6;
            margin: 10px 0;
            border-bottom: 1px solid #e0e0e0; /* Bottom border for separation */
            padding: 10px 0;
        }

        /* Strong Text Styles */
        strong {
            color: #388e3c; /* Dark green for labels */
            font-weight: bold;
        }

        /* Button Styles */
        .edit-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #66bb6a; /* Light green button */
            color: #ffffff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .edit-button:hover {
            background-color: #4caf50; /* Darker green on hover */
        }
    </style>
    <div class="main-content">
        <div class="content-section">
            <h2>Your Profile</h2>
            <p><strong>Username:</strong> <?php echo htmlspecialchars($username); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
            <p><strong>Phone Number:</strong> <?php echo htmlspecialchars($phone_number); ?></p>
            <p><strong>Position:</strong> <?php echo htmlspecialchars($position); ?></p>
            <!-- Optional edit button -->
            <!-- <a href="edit_profile.php" class="edit-button">Edit Profile</a> -->
        </div>
    </div>
</body>
</html>
