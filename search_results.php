<?php
require_once "session_start.php";
require_once "config.php";

$searchTerm = isset($_GET['search']) ? "%" . $_GET['search'] . "%" : "";

$stmt = $conn->prepare("
    SELECT id, name, price, image, 'branded' AS category FROM branded_products_tb WHERE name LIKE ?
    UNION
    SELECT id, name, price, image, 'fashion' AS category FROM fashion_products_tb WHERE name LIKE ?
    UNION
    SELECT id, name, price, image, 'gaming' AS category FROM gaming_products_tb WHERE name LIKE ?
    UNION
    SELECT id, name, price, image, 'home' AS category FROM home_products_tb WHERE name LIKE ?
    UNION
    SELECT id, name, price, image, 'kitchen' AS category FROM kitchen_products_tb WHERE name LIKE ?
    UNION
    SELECT id, name, price, image, 'mobile' AS category FROM mobile_products_tb WHERE name LIKE ?
    UNION
    SELECT id, name, price, image, 'school' AS category FROM school_products_tb WHERE name LIKE ?
");

$stmt->bind_param("sssssss", $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm);
$stmt->execute();
$result = $stmt->get_result();
?>

<?php require('./components/partials/head.php')?>
<?php require('./components/partials/nav.php')?>

  <main class="flex-grow">
  <div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-4">Search Results for "<?= htmlspecialchars($_GET['search']) ?>"</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      <?php while ($row = $result->fetch_assoc()): ?>
        <a href="components/product_layout.php?category=<?= $row['category']; ?>&id=<?= $row['id']; ?>" class="block bg-white p-4 rounded-lg shadow hover:shadow-lg transition">
          <img src="uploads/<?= $row['image'] ?>" alt="<?= htmlspecialchars($row['name']) ?>" class="w-full h-48 object-cover rounded">
          <h3 class="text-lg font-semibold mt-2"><?= htmlspecialchars($row['name']) ?></h3>
          <p class="text-green-600 font-bold">$<?= $row['price'] ?></p>
          <p class="text-sm text-gray-500">Category: <?= ucfirst($row['category']) ?></p>
      </a>
      <?php endwhile; ?>
    </div>

    <?php if ($result->num_rows === 0): ?>
      <p class="mt-4 text-gray-600">No products found.</p>
    <?php endif; ?>
  </div>
  </main>

  <?php require('./components/partials/footer.php')?>
