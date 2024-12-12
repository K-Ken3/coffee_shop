<?php
session_start();

// Clear the cart session after purchase
unset($_SESSION['cart']);

// Redirect to a thank you page
header("Location: thank_you.php");
exit;
?>
