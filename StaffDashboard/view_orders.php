<?php
session_start();
include 'db_connection.php';

// Fetch all orders from the database
$sql = "SELECT * FROM orders";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<div class='orders-container'>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='order'>";
        echo "<h3>Order ID: " . $row['oid'] . "</h3>";
        echo "<p><strong>Contact:</strong> " . $row['contact_number'] . "</p>";
        echo "<p><strong>Shipping Address:</strong> " . $row['shipping_address'] . "</p>";
        echo "<p><strong>Quantity:</strong> " . $row['quantity'] . "</p>";
        echo "<p><strong>Status:</strong> " . $row['status'] . "</p>";

        // Form to update order status
        echo "<form method='POST' action='update_order_status.php'>";
        echo "<input type='hidden' name='oid' value='" . $row['oid'] . "'>";
        echo "<label for='status'>Update Status:</label>";
        echo "<select name='status' class='status-select'>
                <option value='Pending' " . ($row['status'] == 'Pending' ? 'selected' : '') . ">Pending</option>
                <option value='Processing' " . ($row['status'] == 'Processing' ? 'selected' : '') . ">Processing</option>
                <option value='Dispatched' " . ($row['status'] == 'Dispatched' ? 'selected' : '') . ">Dispatched</option>
                <option value='Delivered' " . ($row['status'] == 'Delivered' ? 'selected' : '') . ">Delivered</option>
              </select>";
        echo "<button type='submit' class='update-btn'>Update Status</button>";
        echo "</form>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "<p class='no-orders'>No orders found.</p>";
}

mysqli_close($conn);
?>

<style>
/* General container styling */
body {
            background-color:#d9f7d9; /* Soft background color */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Modern font */
            margin: 0;
            padding: 20px;
            color: #333; /* Dark text color for readability */
        }
.orders-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    margin: 20px;
}

/* Individual order card styling */
.order {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 20px;
    width: 300px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

/* Headings */
.order h3 {
    font-size: 1.4em;
    color: #333;
    margin-bottom: 10px;
}

/* Text paragraphs */
.order p {
    font-size: 1.1em;
    margin: 5px 0;
    color: #555;
}

/* Select dropdown styling */
.status-select {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1em;
}

/* Button styling */
.update-btn {
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
    font-size: 1.1em;
    margin-top: 10px;
    transition: background-color 0.3s;
}

.update-btn:hover {
    background-color: #45a049;
}

/* No orders message styling */
.no-orders {
    text-align: center;
    font-size: 1.2em;
    color: #888;
}

</style>
