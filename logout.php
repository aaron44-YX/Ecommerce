<?php
require_once "session_start.php";
require_once "config.php"; // DB connection

// Save cart to database before logout
if (isset($_SESSION['user_id']) && !empty($_SESSION['cart'])) {
    $user_id = $_SESSION['user_id'];
    $cart = $_SESSION['cart'];

    // Delete existing cart records for this user
    $delete = $conn->prepare("DELETE FROM user_carts WHERE user_id = ?");
    $delete->bind_param("i", $user_id);
    $delete->execute();
    $delete->close();

    // Insert current cart items
    $stmt = $conn->prepare("INSERT INTO user_carts (user_id, product_key, name, price, quantity, category) VALUES (?, ?, ?, ?, ?, ?)");

    foreach ($cart as $key => $item) {
        $stmt->bind_param(
            "issdis",
            $user_id,
            $key,
            $item['name'],
            $item['price'],
            $item['quantity'],
            $item['category']
        );
        $stmt->execute();
    }
    $stmt->close();
}

// Now clear session
session_unset();
session_destroy();

// Redirect to login page
header("Location: login&register.php");
exit();
