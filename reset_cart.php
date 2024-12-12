<?php
session_start();

// Resetting the cart
if (isset($_SESSION['cart'])) {
    unset($_SESSION['cart']); // Clear the cart from the session
}

// Redirect to the shopping page or cart page
header('Location: shopping.php'); // Or 'cart.php' depending on your flow
exit();
?>
