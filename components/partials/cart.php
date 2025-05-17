<?php
require_once __DIR__ . '/../../session_start.php';
$cartCount = 0;
$isLoggedIn = isset($_SESSION['user_id']);

if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $cartCount += $item['quantity'];
    }
}

$cartLink = $isLoggedIn ?   "/ecommerce_project/login&register.php" : "/ecommerce_project/cart_page.php";
?>

<a href="<?= $cartLink ?>" class="relative inline-block">
  <ion-icon name="cart" class="w-6 h-6 text-green-600 cursor-pointer"></ion-icon>
  <?php if ($cartCount > 0): ?>
    <span class="absolute -top-2 -right-2 bg-green-500 text-white text-xs font-bold rounded-full px-1.5">
      <?= $cartCount ?>
    </span>
  <?php endif; ?>
</a>
