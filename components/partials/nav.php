<?php
session_start();
?>
<header class="bg-white shadow-md">
  <nav class="flex flex-wrap items-center justify-between px-4 py-3 max-w-7xl mx-auto">
   
  <a href="/ecommerce_project/homepage.php">
  <h1 class="text-green-600 text-xl font-bold cursor-pointer">Pearlas</h1>
</a>


    <button class="lg:hidden text-green-600 focus:outline-none" onclick="toggleMenu()">
      <ion-icon name="menu" class="text-2xl"></ion-icon>
    </button>

   
    <div id="nav-menu" class="w-full lg:w-auto lg:flex items-center justify-between space-y-4 lg:space-y-0 lg:space-x-6 mt-4 lg:mt-0 hidden lg:flex">
      
    <?php require __DIR__ . '/searchbar.php'; ?>

      <div class="flex items-center justify-center space-x-4 w-full lg:w-auto">
        <ion-icon name="cart" class="w-6 h-6 text-green-600 cursor-pointer"></ion-icon>
        <?php if (isset($_SESSION['fullname'])): ?>
          <a href="user_profile.php" class="cursor-pointer text-green-700 font-bold hover:text-green-500">
            <?= htmlspecialchars($_SESSION['fullname']); ?>
          </a>
        <?php else: ?>
          <a href="login&register.php" class="cursor-pointer px-4 py-2 rounded-full bg-green-600 text-white font-bold hover:bg-green-500">
            Login
          </a>
        <?php endif; ?>
      </div>
    </div>
  </nav>
</header>


<script>
  function toggleMenu() {
    const menu = document.getElementById("nav-menu");
    menu.classList.toggle("hidden");
  }
</script>
