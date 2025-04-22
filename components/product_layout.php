<?php
require '../config.php'; // Database connection
require 'partials/head.php';
require 'partials/nav.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM mobile_products_tb WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($result);
}
?>

<main class="flex-1 p-6">
    <?php if ($product): ?>
        <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow">
            <img src="../uploads/<?= $product['image']; ?>" alt="<?= $product['name']; ?>" class="w-full h-96 object-cover rounded mb-6">
            <h1 class="text-3xl font-bold mb-2"><?= $product['name']; ?></h1>
            <p class="text-gray-700 text-lg mb-4"><?= $product['description']; ?></p>
            <p class="text-2xl text-green-600 font-semibold mb-4">$<?= $product['price']; ?></p>
            <div class="mb-4">
                <label for="quantity" class="mr-2">Quantity:</label>
                <input type="number" id="quantity" name="quantity" value="1" min="1" class="border rounded px-2 py-1 w-20">
            </div>
            <div class="flex gap-4">
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">Add to Cart</button>
                <button class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded">Buy Now</button>
            </div>
        </div>
    <?php else: ?>
        <p class="text-center text-red-600">Product not found.</p>
    <?php endif; ?>
</main>

<?php require 'partials/footer.php'; ?>
