<?php
require_once "session_start.php";

$cart = $_SESSION['cart'] ?? [];
$total = 0;
?>

<?php require('./components/partials/head.php') ?>
<?php require('./components/partials/nav.php') ?>

<main class="flex-grow p-6 bg-gray-200 min-h-screen">
    <h1 class="text-3xl font-bold mb-6">Shopping Cart</h1>

    <?php if (empty($cart)): ?>
        <p class="text-lg text-gray-700">Your cart is empty.</p>
    <?php else: ?>
        <table class="w-full bg-white shadow-md rounded p-5">
            <thead>
                <tr class="text-left border-b font-semibold">
                    <th class="py-2">Product</th>
                    <th class="py-2">Price</th>
                    <th class="py-2">Quantity</th>
                    <th class="py-2">Subtotal</th>
                    <th class="py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $key => $item): ?>
                    <?php
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                        $productId = explode("_", $key)[1]; // extract ID from composite key
                    ?>
                    <tr class="border-b">
                        <td class="py-2"><?= htmlspecialchars($item['name']) ?></td>
                        <td class="py-2">₱<?= number_format($item['price'], 2) ?></td>
                        <td class="py-2"><?= $item['quantity'] ?></td>
                        <td class="py-2">₱<?= number_format($subtotal, 2) ?></td>
                        <td class="py-2">
                            <a href="remove_from_cart.php?product_id=<?= $productId ?>&category=<?= urlencode($item['category']) ?>" class="text-red-500 hover:underline">Remove</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="mt-4 text-right font-semibold text-xl">
            Total: ₱<?= number_format($total, 2) ?>
        </div>
    <?php endif; ?>
</main>

<?php require('./components/partials/footer.php') ?>
