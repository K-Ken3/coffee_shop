<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css"> <!-- Link to external CSS -->
    <title>Coffee Shop</title>
</head>
<body>
    <header>
        <div class="logo">
            <h1>Coffee Shop</h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="shopping.php">Available Products</a></li>
                <li><a href="cart.php">My Orders</a></li>
                <li><a href="index.html">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="welcome">
            <h2>Welcome to Our Coffee Shop!</h2>
            <p>Experience the finest coffee blends and freshly baked goods.</p>
            <p>Join us for a cup of coffee and let us take care of your cravings.</p>
            <a href="shopping.php" class="shop-now">Shop Now</a>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Coffee Shop. All rights reserved.</p>
    </footer>
</body>
</html>
