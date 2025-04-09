<header class="bg-white shadow-md">
  <nav class="flex flex-wrap items-center justify-between px-4 py-3 max-w-7xl mx-auto">
   
    <h1 class="text-green-600 text-xl font-bold">Pearlas</h1>


    <button class="lg:hidden text-green-600 focus:outline-none" onclick="toggleMenu()">
      <ion-icon name="menu" class="text-2xl"></ion-icon>
    </button>

   
    <div id="nav-menu" class="w-full lg:w-auto lg:flex items-center justify-between space-y-4 lg:space-y-0 lg:space-x-6 mt-4 lg:mt-0 hidden lg:flex">
      
      <div class="flex items-center justify-center space-x-2 w-full lg:w-auto">
        <input type="search" placeholder="Search Pearlas" class="w-full lg:w-96 p-2 rounded bg-green-100 focus:outline-green-500">
        <ion-icon name="search" class="text-green-600 cursor-pointer text-xl"></ion-icon>
      </div>

      
      <div class="flex items-center justify-center space-x-4 w-full lg:w-auto">
        <ion-icon name="cart" class="w-6 h-6 text-green-600 cursor-pointer"></ion-icon>
        <button id="user_login" onclick="redirectToLogin()" class="cursor-pointer px-4 py-2 rounded-full bg-green-600 text-white font-bold hover:bg-green-500">
          Login
        </button>
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
