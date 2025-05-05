<div class="flex items-center justify-center space-x-2 w-full lg:w-auto">
        <form action="/ecommerce_project/search_results.php" method="GET">
        <input type="search" name="search" placeholder="Search Pearlas" class="w-full lg:w-96 p-2 rounded bg-green-100 focus:outline-green-500" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
        <button type="submit"><ion-icon name="search" class="text-green-600 cursor-pointer text-xl"></ion-icon></button>
        </form>
      </div>