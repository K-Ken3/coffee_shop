<!-- process_checkout.php -->
<?php
session_start();

// Assuming you have a database connection
require 'db_connection.php'; // Update this with your actual connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize user inputs
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $total_amount = floatval($_POST['total_amount']);

    // Check if the cart is not empty
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        echo "Your cart is empty.";
        exit();
    }

    // Insert order into the database
    $orderQuery = "INSERT INTO orders (full_name, address, phone, total_amount) VALUES ('$full_name', '$address', '$phone', $total_amount)";
    if (mysqli_query($conn, $orderQuery)) {
        $order_id = mysqli_insert_id($conn); // Get the ID of the new order

        // Insert each cart item into the order_items table
        foreach ($_SESSION['cart'] as $product_id => $quantity) {
            $itemQuery = "INSERT INTO order_items (order_id, product_id, quantity) VALUES ($order_id, $product_id, $quantity)";
            mysqli_query($conn, $itemQuery);
        }

        // Clear the cart after successful checkout
        unset($_SESSION['cart']);

        // Redirect to a success page
        header('Location: success.php');
        exit();
    } else {
        echo "Error processing your order. Please try again.";
    }
}
?>