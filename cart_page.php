<?php
require_once "session_start.php";

$cart = $_SESSION['cart'] ?? [];
?>

<?php require('./components/partials/head.php') ?>
<?php require('./components/partials/nav.php') ?>

<main class="flex-grow p-4">
    <h1 class="text-3xl font-bold mb-6">Shopping Cart</h1>

    <?php if (empty($cart)): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <form action="checkout.php" method="POST" id="cartForm">
            <table class="w-full bg-white shadow-md rounded p-5">
                <thead>
                    <tr class="text-left border-b">
                        <th class="py-2">
                            <input type="checkbox" id="selectAll"> Product
                        </th>
                        <th class="py-2">Price</th>
                        <th class="py-2">Quantity</th>
                        <th class="py-2">Subtotal</th>
                        <th class="py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart as $key => $item): ?>
                        <?php
                            if (empty($item['name']) || !isset($item['price'])) {
                                unset($_SESSION['cart'][$key]);
                                continue;
                            }

                            $subtotal = $item['price'] * $item['quantity'];
                            $parts = explode('_', $key);
                            $category = $parts[0];
                            $product_id = $parts[1] ?? null;
                            if (!$product_id) continue;
                        ?>
                        <tr class="border-b cart-row">
                            <td class="py-2">
                                <input type="checkbox" class="product-check" name="selected_items[]" value="<?= $key ?>" data-subtotal="<?= $subtotal ?>">
                                <?= htmlspecialchars($item['name']) ?>
                            </td>
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

            <div class="flex justify-between items-center mt-6">
                <div class="font-semibold text-lg">
                    Selected Total: ₱<span id="selectedTotal">0.00</span>
                </div>
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg">
                    Checkout
                </button>
            </div>
        </form>
    <?php endif; ?>
</main>
<script src="script.js"></script>

<?php require('./components/partials/footer.php') ?>

