<?php
session_start();

// Check if the cart is not empty
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    // Get user input, with default values to prevent warnings
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : 'Not provided';
    $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : 'Not provided';

    // Prepare a list of items in the cart
    $itemsList = '';
    foreach ($_SESSION['cart'] as $item) {
        $itemsList .= htmlspecialchars($item) . '<br>';
    }

    // Display order confirmation
    echo "<h1>Order Confirmed!</h1>";
    echo "<p>Thank you for your order. We will contact you shortly via your provided email or phone number.</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Phone: $phone</p>";
    echo "<h2>Your Selected Items:</h2>";

    if (!empty($itemsList)) {
        echo $itemsList;
    } else {
        echo "<p>Your cart is empty.</p>";
    }
} else {
    // Redirect to home or show an error message
    echo "<h1>No items in cart!</h1>";
    echo "<p>Please <a href='index.php'>go back</a> and select items to order.</p>";
}
?>
