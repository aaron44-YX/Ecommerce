<?php

require_once "session_start.php";

if (isset($_GET['product_id']) && isset($_SESSION['cart'][$_GET['product_id']])) {
    unset($_SESSION['cart'][$_GET['product_id']]);
}

header("Location: cart_page.php");
exit();

?>