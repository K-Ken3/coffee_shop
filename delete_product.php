<?php
// delete_product.php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php'); // Redirect to admin login if not logged in
    exit();
}

// Include database connection
include('db_connection.php');

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Prepare delete statement
    $query = "DELETE FROM products WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $product_id);

    if ($stmt->execute()) {
        echo "Product deleted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    header("Location: manage_products.php"); // Redirect back to manage products
}
?>
