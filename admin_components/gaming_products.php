<?php
require 'config.php'; 

$query = "SELECT * FROM gaming_products_tb";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaming Products</title>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@4"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons.esm.js"></script>
</head>
<body>

    <div class="flex justify-end items-center p-4">
        <a href="?page=addgaming_products" class="text-green-700 font-semibold flex items-center active:bg-green-300">
            <ion-icon name="add-outline" class="text-green-700 cursor-pointer w-5 h-5"></ion-icon>CREATE
        </a>
    </div>

    <!-- Product List -->
    <div class="grid grid-cols-3 gap-4 p-4">
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="border border-gray-300 p-4 rounded-lg shadow ">
                <img src="uploads/<?= $row['image']; ?>" alt="<?= $row['name']; ?>" class="w-full h-40 object-cover border border-gray-300 rounded">
                <h2 class="text-lg font-bold mt-2"><?= $row['name']; ?></h2>
                <p class="text-gray-600"><?= $row['description']; ?></p>
                <p class="text-gray-600">$<?= $row['price']; ?></p>   
                <a href="?page=editgaming_products&id=<?= $row['id']; ?>" class="text-green-700">Edit</a>
            </div>
        <?php endwhile; ?>
    </div>

</body>
</html>
