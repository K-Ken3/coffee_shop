<?php
session_start();

// Ensure the cart is initialized
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Get cart items from session
$cartItems = $_SESSION['cart'];

// Check if cart items are empty
$cartIsEmpty = empty($cartItems);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/cart.css">
    <title>Checkout | Coffee Shop</title>
</head>
<body>
    <div class="sidebar">
        <h2>Coffee Shop</h2>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="shopping.php">Available Products</a></li>
            <li><a href="cart.php">My Orders</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
        <h2>Your Cart</h2>
        <div class="cart-items">
            <?php if ($cartIsEmpty): ?>
                <p>Your cart is empty.</p>
            <?php else: ?>
                <ul>
                    <?php foreach ($cartItems as $item): ?>
                        <li>
                            <?php 
                            // Check if 'name' and 'quantity' exist to avoid undefined index warnings
                            $itemName = isset($item['name']) ? htmlspecialchars($item['name']) : 'Unknown Item';
                            $itemQuantity = isset($item['quantity']) ? htmlspecialchars($item['quantity']) : 0;
                            ?>
                            <?php echo $itemName . ' - Quantity: ' . $itemQuantity; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        <button onclick="document.location='thank_you.php'">Proceed to Checkout</button>
    </div>
</body>
</html>
