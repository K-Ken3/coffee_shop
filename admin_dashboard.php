<?php
// admin_dashboard.php

session_start();
require 'db_connection.php'; // Assuming your database connection file is named 'db_connection.php'

// Check if the admin is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

// Fetch total users
$result_users = $conn->query("SELECT COUNT(*) AS total_users FROM users");
$total_users = $result_users->fetch_assoc()['total_users'];

// Fetch total orders
$result_orders = $conn->query("SELECT COUNT(*) AS total_orders FROM orders");
$total_orders = $result_orders->fetch_assoc()['total_orders'];

// Fetch total revenue
$result_revenue = $conn->query("SELECT SUM(total_amount) AS total_revenue FROM orders WHERE status = 'Completed'");
$total_revenue = $result_revenue->fetch_assoc()['total_revenue'];

// Fetch pending orders
$result_pending = $conn->query("SELECT COUNT(*) AS pending_orders FROM orders WHERE status = 'Pending'");
$pending_orders = $result_pending->fetch_assoc()['pending_orders'];

// Fetch all users
$users_data = $conn->query("SELECT username, email FROM users");

// Fetch all orders
$orders_data = $conn->query("
    SELECT orders.order_id, users.username, orders.total_amount, orders.status, orders.order_date
    FROM orders
    JOIN users ON orders.user_id = users.user_id
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/admin_dashboard.css">
    <title>Admin Dashboard | Coffee Shop</title>
</head>
<body>
    <div class="sidebar">
        <h2>Coffee Shop Admin</h2>
        <ul>
            <li><a href="#dashboard">Dashboard Overview</a></li>
            <li><a href="#users">User Management</a></li>
            <li><a href="#orders">Order Management</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
        <section id="dashboard">
            <h2>Dashboard Overview</h2>
            <div class="stats">
                <div class="stat-item">Total Users: <?php echo $total_users; ?></div>
                <div class="stat-item">Total Orders: <?php echo $total_orders; ?></div>
                <div class="stat-item">Total Revenue: $<?php echo number_format($total_revenue, 2); ?></div>
                <div class="stat-item">Pending Orders: <?php echo $pending_orders; ?></div>
            </div>
        </section>
        <section id="users">
            <h2>User Management</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($user = $users_data->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $user['username']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>
        <section id="orders">
    <h2>Order Management</h2>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Username</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($orders_data->num_rows > 0): ?>
                <?php while ($order = $orders_data->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $order['order_id']; ?></td>
                        <td><?php echo $order['username']; ?></td>
                        <td><?php echo $order['total_amount']; ?></td>
                        <td><?php echo $order['status']; ?></td>
                        <td><?php echo $order['order_date']; ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No orders found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</section>

    </div>
</body>
</html>
