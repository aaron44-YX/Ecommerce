<?php
require 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch product details
    $query = "SELECT * FROM mobile_products_tb WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($result);
}

// Handle update
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    // Upload new image if selected
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp, "uploads/$image");

        $updateQuery = "UPDATE mobile_products_tb SET name='$name', description='$description', quantity='$quantity', price='$price', image='$image' WHERE id=$id";
    } else {
        $updateQuery = "UPDATE mobile_products_tb SET name='$name', description='$description', quantity='$quantity', price='$price' WHERE id=$id";
    }

    mysqli_query($conn, $updateQuery);
    header('Location: ?page=mobile_products');
    exit;
}

// Handle delete
if (isset($_POST['delete'])) {
    $deleteQuery = "DELETE FROM mobile_products_tb WHERE id=$id";
    mysqli_query($conn, $deleteQuery);
    header('Location: ?page=mobile_products');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6">
<div class="max-w-xl mx-auto bg-white border border-gray-300 p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Edit Product</h1>
    <form method="POST" enctype="multipart/form-data" class="space-y-4 max-w-md">
    <div class="mb-4">
                <label class="block mb-1">Current Image:</label>
                <img src="uploads/<?= $product['image']; ?>" alt="" class="h-32 mb-2">
                <input type="file" name="image" class="w-full border border-gray-300 rounded">
            </div>

        <div>
            <label>Name</label>
            <input type="text" name="name" value="<?= $product['name']; ?>" class="border w-full p-2 rounded">
        </div>

        <div>
            <label>Description</label>
            <textarea name="description" class="border w-full p-2 rounded"><?= $product['description']; ?></textarea>
        </div>

        <div>
            <label>Quantity</label>
            <input type="number" name="quantity" value="<?= $product['quantity']; ?>" class="border w-full p-2 rounded">
        </div>

        <div>
            <label>Price</label>
            <input type="text" name="price" value="<?= $product['price']; ?>" class="border w-full p-2 rounded">
        </div>

        <div class="flex space-x-4">
            <button type="submit" name="update" class="bg-green-500 text-white px-4 py-2 rounded">Update</button>
            <button type="submit" name="delete" class="bg-red-500 text-white px-4 py-2 rounded" onclick="return confirm('Are you sure you want to delete this product?');">Delete</button>
        </div>
    </form>
</div>
</body>
</html>
