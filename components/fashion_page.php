<?php
require '../config.php'; // Ensure database connection

// Fetch mobile accessories from the database
$query = "SELECT * FROM fashion_products_tb"; // Adjust query if category filter is needed
$result = mysqli_query($conn, $query);
?>
    <?php require('partials/head.php')?>
    <?php require('partials/nav.php')?>
    
    <main class="h-screen">

    <!-- Product List -->
    <div class="grid grid-cols-3 gap-4 p-4">
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <a href="product_layout.php?category=fashion_products_tb&id=<?= $row['id']; ?>" class="block bg-white p-4 rounded-lg shadow hover:scale-105 transform transition-transform cursor-pointer">
            <img src="../uploads/<?= $row['image']; ?>" alt="<?= $row['name']; ?>" class="w-full h-60 object-cover rounded">
            <h2 class="text-lg font-bold mt-2"><?= $row['name']; ?></h2>
            <p class="text-gray-600"><?= $row['description']; ?></p>
            <p class="text-gray-600">₱<?= $row['price']; ?></p>
        </a>  
        <?php endwhile; ?>
    </div>
    </main>

    <?php require('partials/footer.php')?>