<?php
require_once "session_start.php";

$cart = $_SESSION['cart'] ?? [];
$total = 0;
?>

<?php require('./components/partials/head.php') ?>
<?php require('./components/partials/nav.php') ?>

<main class="flex-grow p-4">
    <h1 class="text-3xl font-bold mb-6">Shopping Cart</h1>

    <?php if (empty($cart)): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <table class="w-full bg-white shadow-md rounded p-5">
            <thead>
                <tr class="text-left border-b">
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
                        // Skip invalid items (missing name or price)
                        if (empty($item['name']) || !isset($item['price'])) {
                            unset($_SESSION['cart'][$key]);
                            continue;
                        }

                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;

                        // Extract product_id and category for removal link
                        $parts = explode('_', $key);
                        $category = $parts[0];
                        $product_id = $parts[1] ?? null;

                        if (!$product_id) continue;
                    ?>
                    <tr class="border-b">
                        <td class="py-2"><?= htmlspecialchars($item['name']) ?></td>
                        <td class="py-2">₱<?= number_format($item['price'], 2) ?></td>
                        <td class="py-2"><?= $item['quantity'] ?></td>
                        <td class="py-2">₱<?= number_format($subtotal, 2) ?></td>
                        <td class="py-2">
                            <a href="remove_from_cart.php?product_id=<?= $product_id ?>&category=<?= $category ?>" class="text-red-500 hover:underline">Remove</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="mt-4 text-right font-semibold text-lg">
            Total: ₱<?= number_format($total, 2) ?>
        </div>
    <?php endif; ?>
</main>

<?php require('./components/partials/footer.php') ?>
