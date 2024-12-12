<?php
session_start();

// Get the cart items from the request
$data = json_decode(file_get_contents('php://input'), true);

// Debugging: Check if data is received
file_put_contents('debug.log', print_r($data, true), FILE_APPEND);

// Initialize cart items in the session if not set
if (!isset($_SESSION['cartItems'])) {
    $_SESSION['cartItems'] = [];
}

// Update the session with new cart items
$_SESSION['cartItems'] = $data;

// Debugging: Check what is stored in the session
file_put_contents('debug.log', print_r($_SESSION['cartItems'], true), FILE_APPEND);

// Return a response
echo json_encode(['status' => 'success', 'cartCount' => count($_SESSION['cartItems'])]);
?>
