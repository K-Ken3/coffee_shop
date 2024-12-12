<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (!isset($data['name']) || !isset($data['price'])) {
        exit;
    }

    $productName = $data['name'];
    $productPrice = $data['price'];

    // Initialize the cart if not already set
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Check if the item already exists in the cart
    $itemExists = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['name'] === $productName) {
            $item['quantity'] += 1;
            $itemExists = true;
            break;
        }
    }

    // If the item does not exist, add it to the cart
    if (!$itemExists) {
        $_SESSION['cart'][] = [
            'name' => $productName,
            'price' => $productPrice,
            'quantity' => 1
        ];
    }
}
?>
