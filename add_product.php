<?php
// add_product.php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php'); // Redirect to admin login if not logged in
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Include database connection
    include('db_connection.php');

    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $image = $_FILES['image'];

    // Validate inputs
    if (!empty($product_name) && !empty($price) && !empty($image)) {
        // Define target directory and file path
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image["name"]);

        // Move uploaded file to the target directory
        if (move_uploaded_file($image["tmp_name"], $target_file)) {
            // Insert product details into database
            $query = "INSERT INTO products (name, price, image) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sds", $product_name, $price, $target_file);

            if ($stmt->execute()) {
                echo "Product added successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }
        } else {
            echo "Error uploading image.";
        }
    } else {
        echo "Please fill all fields.";
    }
}
?>
