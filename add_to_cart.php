<?php
require_once "session_start.php";
require_once "config.php";

if (isset($_GET['product_id']) && isset($_GET['category'])) {
    $product_id = intval($_GET['product_id']);
    $category = $_GET['category'];
    $quantity = isset($_GET['quantity']) ? max(1, intval($_GET['quantity'])) : 1;

    $category_map = [
        'branded' => 'branded_products_tb',
        'fashion' => 'fashion_products_tb',
        'gaming' => 'gaming_products_tb',
        'home' => 'home_products_tb',
        'school' => 'school_products_tb',
        'kitchen' => 'kitchen_products_tb',
        'mobile' => 'mobile_products_tb'
    ];

    if (!array_key_exists($category, $category_map)) {
        die("Invalid category.");
    }

    $table = $category_map[$category];
    $query = "SELECT * FROM `$table` WHERE id = $product_id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);

        // Sanity check
        if (!$product || !isset($product['name'], $product['price'])) {
            die("Product data is incomplete.");
        }

        // Initialize cart if not set
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Use composite key to support multiple categories with same ID
        $cartKey = $category . "_" . $product_id;

        if (isset($_SESSION['cart'][$cartKey])) {
            $_SESSION['cart'][$cartKey]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$cartKey] = [
                'name' => $product['name'],
                'price' => floatval($product['price']),
                'quantity' => $quantity,
                'category' => $category
            ];
        }

        header("Location: cart_page.php");
        exit();
    } else {
        die("Product not found.");
    }
} else {
    die("Missing parameters.");
}
?>