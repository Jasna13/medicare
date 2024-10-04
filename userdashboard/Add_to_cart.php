<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart | MediCare</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="navbar">
            <h1 class="logo">MediCare</h1>
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="products.html">Products</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="Add_to_cart.html">Add to Cart</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="cart-section">
        <h2>Your Cart</h2>
        <div class="cart-items">
            <!-- <?php
            // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "medico_shop";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Assuming user_id is 1 for now
            $userId = 1;
            $sql = "SELECT products.name, products.price, cart.product_id FROM cart 
                    JOIN products ON cart.product_id = products.id 
                    WHERE cart.user_id = '$userId'";

            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='cart-item'>
                            <p>Product: " . htmlspecialchars($row['name'], ENT_QUOTES) . "</p>
                            <p>Price: $" . number_format($row['price'], 2) . "</p>
                          </div>";
                }
            } else {
                echo "<p>Your cart is empty.</p>";
            }

            $conn->close();
            ?>
        </div>
    </section> -->

    <footer>
        <p>&copy; 2024 MediCare. All rights reserved.</p>
    </footer>
</body>
</html>
