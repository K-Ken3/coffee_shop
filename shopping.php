<?php
// Database connection
include 'db_connection.php';

// Fetch items from the database
$query = "SELECT item_id, item_name, price, description FROM items";
$result = $conn->query($query);
$products = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/shopping.css">
    <script src="js/cart.js" defer></script>
    <title>Shopping Page | Coffee Shop</title>
</head>
<body>
    <header>
        <nav>
        <div class="sidebar">
    <h2>Coffee Shop</h2>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="shopping.php">Available Products</a></li>
        <li><a href="cart.php">My Orders</a></li> <!-- Link to the cart page -->
        <li><a href="index.html" class="logout-button">Logout</a></li>
    </ul>
</div>

    </header>
    
    <h1>Available Products</h1>
    <div class="product-list">
        <?php foreach ($products as $product): ?>
        <div class="product-card">
            <img src="images/<?php echo htmlspecialchars($product['item_name']) ?>.jpg" alt="<?php echo htmlspecialchars($product['item_name']) ?>">
            <h2><?php echo htmlspecialchars($product['item_name']) ?></h2>
            <p><?php echo htmlspecialchars($product['description']) ?></p>
            <p>Price: $<?php echo htmlspecialchars(number_format($product['price'], 2)) ?></p>
            <button class="add-to-cart" onclick="addToCart(<?php echo $product['item_id'] ?>, '<?php echo addslashes($product['item_name']) ?>', <?php echo $product['price'] ?>)">Add to Cart</button>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="continue-section">
        <button onclick="document.location='checkout.php'">Proceed to Checkout</button>
        <button onclick="resetCart()" class="reset-cart">Reset Cart</button>
    </div>
    <footer>
    <p>&copy; 2024 Coffee Shop. All rights reserved.</p>
    <a href="index.html" class="logout-button">Logout</a>
    
    <div id="selected-items">
        <h3>Selected Items:</h3>
        <div id="item-list"></div>
    </div>
</footer>
    <form id="checkoutForm" action="checkout.php" method="POST" style="display: none;">
        <input type="hidden" name="cartData" id="cartDataInput">
    </form> 
    <script src="cart.js"></script>
</body>
</html>
