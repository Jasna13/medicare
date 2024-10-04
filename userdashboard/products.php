<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products | MediCare</title>
  <link rel="stylesheet" href="styles.css">
  <!-- <script src="script.js" defer></script> -->
</head>
<body>
  <!-- Navbar -->
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

  <!-- Category Selection Section -->
  <section class="category-section">
    <h2>Select Category</h2>
    <select id="categorySelect">
      <option value="all">All Products</option>
      <option value="medicines">Medicines</option>
      <option value="supplements">Supplements</option>
      <option value="medical-equipment">Medical Equipment</option>
      <option value="personal-care">Personal Care</option>
    </select>
  </section>

  <!-- Products Section -->
  <section class="products-section">
    <h2>Products</h2>
    <div class="products-grid">
      <?php
      // Database connection
      $servername = "localhost"; 
      $username = "root"; 
      $password = "root"; 
      $dbname = "medico_shop"; 

      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // Get category from the request or default to 'all'
      $category = isset($_GET['category']) ? $conn->real_escape_string($_GET['category']) : 'all';
      $sql = ($category === 'all') ? "SELECT * FROM products" : "SELECT * FROM products WHERE category='$category'";

      $result = $conn->query($sql);

      if ($result && $result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              // Check for discounted price
              $discountedPrice = (isset($row['discounted_price']) && $row['discounted_price'] > 0 && $row['discounted_price'] < $row['price'])
                                ? number_format($row['discounted_price'], 2)
                                : number_format($row['price'], 2);

              $priceDisplay = ($discountedPrice < $row['price'])
                              ? "<span class='original-price'>\$" . number_format($row['price'], 2) . "</span> \$" . $discountedPrice
                              : "\$" . $discountedPrice;

              // Image path with validation
              $imagePath = !empty($row['image']) ? htmlspecialchars($row['image'], ENT_QUOTES) : 'default-image.jpg';
              
              // If the image does not exist, show a default image
              if (!file_exists($imagePath)) {
                  $imagePath = 'default-image.png'; // Path to your default image
              }

              // Display product card
              echo "<div class='product-card' data-category='" . htmlspecialchars($row['category'], ENT_QUOTES) . "' data-id='" . htmlspecialchars($row['id'], ENT_QUOTES) . "'>
                      <img src='$imagePath' alt='" . htmlspecialchars($row['name'], ENT_QUOTES) . "' style='width: 150px; height: 150px;' /> <!-- Product Image -->
                      <h3>" . htmlspecialchars($row['name'], ENT_QUOTES) . "</h3>
                      <p>Price: $priceDisplay</p>
                      <button class='btn view-details' onclick='viewDetails(\"" . htmlspecialchars($row['id'], ENT_QUOTES) . "\")'>View Details</button>
                    </div>";
          }
      } else {
          echo "<p>No products available.</p>";
      }

      $conn->close();
      ?>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <p>&copy; 2024 MediCare. All rights reserved.</p>
  </footer>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // View Details functionality
      window.viewDetails = function(productId) {
        // Redirect to product details page or show a modal
        window.location.href = "product_details.php?id=" + productId; // Change to your product details page
      };

      // Category selection functionality
      const categorySelect = document.getElementById('categorySelect');
      categorySelect.addEventListener('change', function() {
        const selectedCategory = categorySelect.value;
        const products = document.querySelectorAll('.product-card');

        products.forEach(product => {
          const productCategory = product.getAttribute('data-category');
          product.style.display = (selectedCategory === 'all' || productCategory === selectedCategory) ? 'block' : 'none';
        });
      });
    });
  </script>
</body>
</html>
