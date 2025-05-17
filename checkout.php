<?php
require_once "session_start.php";

$checkedOutItems = [];
$message = "";
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedItems = $_POST['selected_items'] ?? [];

    if (empty($selectedItems)) {
        $message = "No items selected for checkout.";
    } else {
        $cart = $_SESSION['cart'] ?? [];

        foreach ($selectedItems as $key) {
            if (isset($cart[$key])) {
                $checkedOutItems[] = $cart[$key];
                unset($_SESSION['cart'][$key]); // remove checked out items
            }
        }

        $success = true;
        $message = "You have successfully checked out " . count($checkedOutItems) . " item(s).";
    }
} else {
    header('Location: homepage.php');
    exit;
}
?>

<?php require('./components/partials/head.php') ?>
<?php require('./components/partials/nav.php') ?>

<main class="flex-grow p-6">
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-8 mt-10 text-center">
        <?php if ($success): ?>
            <h1 class="text-3xl font-bold text-green-600 mb-4">Checkout Successful</h1>
            <p class="text-lg text-gray-700 mb-6"><?= htmlspecialchars($message) ?></p>

            <ul class="text-left text-gray-800 mb-6">
                <?php foreach ($checkedOutItems as $item): ?>
                    <li class="border-b py-2">
                        <?= htmlspecialchars($item['name']) ?> — Quantity: <?= $item['quantity'] ?> — $<?= number_format($item['price'], 2) ?>
                    </li>
                <?php endforeach; ?>
            </ul>

            <a href="homepage.php" class="inline-block mt-4 bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded">
                Back to homepage
            </a>
        <?php else: ?>
            <h1 class="text-2xl font-bold text-red-600 mb-4">Checkout Failed</h1>
            <p class="text-gray-700"><?= htmlspecialchars($message) ?></p>
            <a href="homepage.php" class="inline-block mt-4 bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded">
                Return to homepage
            </a>
        <?php endif; ?>
    </div>
</main>

<script src="script.js"></script>
<?php require('./components/partials/footer.php') ?>
