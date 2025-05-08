<?php

require_once "session_start.php";

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Sample product data (replace this with DB query)
    $product = [
        'id' => $product_id,
        'name' => "Sample Product $product_id",
        'price' => 99.00,
    ];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Add or increment item
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity']++;
    } else {
        $_SESSION['cart'][$product_id] = [
            'name' => $product['name'],
            'price' => $product['price'],
            'quantity' => 1
        ];
    }

    header("Location: cart_page.php");
    exit();
}

?>