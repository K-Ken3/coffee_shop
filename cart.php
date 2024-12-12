<?php
session_start();

// Assuming you store cart items in session
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$cartItems = $_SESSION['cart']; // Get cart items from session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/cart.css">
    <title>Your Cart | Coffee Shop</title>
</head>
<body>
    <div class="sidebar">
        <h2>Coffee Shop</h2>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="shopping.php">Available Products</a></li>
            <li><a href="cart.php">My Orders</a></li>
            <li><a href="index.html" class="logout-button">Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
        <h2>Your Cart</h2>
        <div class="cart-items">
            <?php if (empty($cartItems)): ?>
                <p>Your cart is empty.</p>
            <?php else: ?>
                <ul>
                    <?php foreach ($cartItems as $item): ?>
                        <li><?php echo htmlspecialchars($item); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        <button onclick="document.location='checkout.php'">Proceed to Checkout</button>
    </div>
</body>
</html>
