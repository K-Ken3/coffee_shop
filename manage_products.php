<?php
// manage_products.php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php'); // Redirect to admin login if not logged in
    exit();
}

// Include database connection
include('db_connection.php');

$query = "SELECT * FROM products"; // Adjust query as needed
$result = $conn->query($query);

echo '<h1>Manage Products</h1>';
echo '<table>';
echo '<tr><th>Product ID</th><th>Name</th><th>Price</th><th>Image</th><th>Action</th></tr>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . $row['price'] . '</td>';
        echo '<td><img src="' . $row['image'] . '" alt="Product Image" width="50" height="50"></td>';
        echo '<td><button onclick="deleteProduct(' . $row['id'] . ')">Delete</button></td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="5">No products found</td></tr>';
}

echo '</table>';
?>

<script>
function deleteProduct(productId) {
    if (confirm('Are you sure you want to delete this product?')) {
        window.location.href = 'delete_product.php?id=' + productId;
    }
}
</script>
