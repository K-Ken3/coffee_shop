<?php
// view_orders.php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php'); // Redirect to admin login if not logged in
    exit();
}

// Include database connection
include('db_connection.php');

$query = "SELECT * FROM orders"; // Adjust query as needed
$result = $conn->query($query);

echo '<h1>Orders</h1>';
echo '<table>';
echo '<tr><th>Order ID</th><th>User ID</th><th>Product ID</th><th>Quantity</th><th>Status</th></tr>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['order_id'] . '</td>';
        echo '<td>' . $row['user_id'] . '</td>';
        echo '<td>' . $row['product_id'] . '</td>';
        echo '<td>' . $row['quantity'] . '</td>';
        echo '<td>' . $row['status'] . '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="5">No orders found</td></tr>';
}

echo '</table>';
?>
