<?php

require_once "session_start.php";

if (isset($_GET['product_id']) && isset($_GET['category'])) {
    $product_id = intval($_GET['product_id']);
    $category = $_GET['category'];

    $cartKey = $category . "_" . $product_id;

    if (isset($_SESSION['cart'][$cartKey])) {
        unset($_SESSION['cart'][$cartKey]);
    }
}

header("Location: cart_page.php");
exit();
