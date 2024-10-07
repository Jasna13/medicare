<?php
session_start();
include 'db_connection.php';

$oid = $_POST['oid'];
$status = $_POST['status'];

// Update the status of the order in the orders table
$sql = "UPDATE orders SET status='$status' WHERE oid='$oid'";

if (mysqli_query($conn, $sql)) {
    echo "Order status updated successfully!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
header('Location: view_orders.php'); // Redirect back to orders page after update
?>
