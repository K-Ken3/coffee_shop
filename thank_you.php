<?php
session_start();

// Optionally, you could clear the cart session here
// unset($_SESSION['cartItems']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/thank_you.css"> <!-- Add your CSS file -->
    <title>Thank You | Coffee Shop</title>
</head>
<body>
    <div class="thank-you-container">
        <h1>Congratulations!</h1>
        <p>Thank you for your order. Please press *182*1*1*0788205500# and follow the instructions given to end the placement.</p>
        <p>We appreciate your business and hope you enjoy your products!</p>
        <button onclick="window.location.href='index.php'">Return to Home</button>
    </div>
</body>
</html>
