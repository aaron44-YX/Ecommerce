<?php
require '../config.php'; 
require 'partials/head.php';
require 'partials/nav.php';

$product = null;
if (isset($_GET['id']) && isset($_GET['category'])) {
    $id = intval($_GET['id']);

    // Map short category to full table name
    $category_map = [
        'branded' => 'branded_products_tb',
        'fashion' => 'fashion_products_tb',
        'gaming' => 'gaming_products_tb',
        'home' => 'home_products_tb',
        'school' => 'school_products_tb',
        'kitchen' => 'kitchen_products_tb',
        'mobile' => 'mobile_products_tb'
    ];

    $category = $_GET['category'];

    if (array_key_exists($category, $category_map)) {
        $table = $category_map[$category];
        $query = "SELECT * FROM $table WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $product = mysqli_fetch_assoc($result);
    }
}

?>

<main class="flex-1 p-6">
    <?php if ($product): ?>
        <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow">
            <img src="../uploads/<?= $product['image']; ?>" alt="<?= $product['name']; ?>" class="w-full h-96 object-cover rounded mb-6">
            <h1 class="text-3xl font-bold mb-2"><?= $product['name']; ?></h1>
            <p class="text-gray-700 text-lg mb-4"><?= $product['description']; ?></p>
            <p class="text-2xl text-green-600 font-semibold mb-4">$<?= number_format($product['price'], 2); ?></p>

            <!-- Add to Cart Form -->
            <form action="../add_to_cart.php" method="get" class="mb-4">
                <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                <input type="hidden" name="category" value="<?= $_GET['category']; ?>">

                <label for="quantity" class="mr-2">Quantity:</label>
                <input type="number" id="quantity" name="quantity" value="1" min="1" class="border rounded px-2 py-1 w-20 mb-4">

                <div class="flex gap-4">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">Add to Cart</button>
                    <button type="button" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded">Buy Now</button>
                </div>
            </form>
        </div>
    <?php else: ?>
        <p class="text-center text-red-600">Product not found.</p>
    <?php endif; ?>
</main>

<?php require 'partials/footer.php'; ?>
