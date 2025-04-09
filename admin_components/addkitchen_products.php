<?php

session_start();
require_once "config.php";

if(isset($_POST['save'])){
    $name = $_POST['name'];
    $imageName = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    $imagePath = "uploads/" . $imageName;
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    move_uploaded_file($imageTmpName, $imagePath);
    $conn->query("INSERT INTO kitchen_products_tb (name, image, description, quantity, price) VALUES ('$name', '$imageName', '$description', '$quantity', '$price')") or die($conn->error);
    header("Location: ?page=kitchen_products");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="" method="post" enctype="multipart/form-data" class="bg-white w-296 h-200 rounded-xl border border-gray-300">

        <h1 class="text-gray-600 font-semibold p-4 text-2xl">Create Product</h1>
        <div class="flex flex-col px-4 text-gray-600">
            <label for="" class="mb-2 ">Name*</label>
            <input type="text" name="name" class="border border-gray-300 w-100 rounded-lg p-2 mb-2" required>
        </div>
        <div class="flex flex-col px-4 text-gray-600">
            <label for="" class="mb-2 ">Image*</label>
            <input type="file" name="image" class="border border-gray-300 w-100 rounded-lg p-2 mb-2" required>
        </div>
        <div class="flex flex-col px-4 text-gray-600">
            <label for="" class="mb-2 ">Description*</label>
            <textarea rows="3" name="description" class="border border-gray-300 rounded-lg p-2 mb-2" required></textarea>
        </div>
        <div class="flex flex-col px-4 text-gray-600">
            <label for="" class="mb-2 ">Quantity*</label>
            <input type="number" name="quantity" step="1" min="0" class="border border-gray-300 w-50 rounded-lg p-2 mb-2" required></input>
        </div>
        <div class="flex flex-col px-4 text-gray-600">
            <label for="" class="mb-2 ">Price*</label>
            <input type="number" name="price" step="0.01" min="0" class="border border-gray-300 w-50 rounded-lg p-2 mb-2" required></input>
        </div>
        <div class="p-4">
            <button name="save" type="submit" class="rounded-xl bg-green-400 text-white font-semibold py-2 px-4 text-md active:bg-green-800 transition-colors duration-200">SAVE</button>
        </div>
 
    </form>

</body>
</html>