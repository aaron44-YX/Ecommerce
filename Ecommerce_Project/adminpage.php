<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</head>
<body class="font-[Poppins, sans-serif]">
    <nav class="flex justify-between items-center px-[10px] py-[20px] border-b border-b-gray-300">
        <h1 class="text-green-400 text-xl font-bold px-4">Pearlas</h1>
        <button class="px-[10px] py-[10px] rounded-3xl border-none font-bold bg-white cursor-pointer text-green-600 no-underline hover:bg-green-400 hover:text-white" id="admin_logout" onclick="redirectToLogin()">Logout</a></button>
    </nav>
        
    <div class="flex h-screen">
    <div class="border-r border-r-gray-300 h-screen w-60">
            <ul class="p-5 ">
                <li class="mb-15 font-bold text-gray-600 hover:border-b hover:border-b-offset-4"><ion-icon class="text-black" name="clipboard-outline"></ion-icon><a href="" data-page="dashboard" class="ml-4 hover:text-gray-700 " >Dashboard</a></li>
                <li class="mb-15 font-bold text-gray-600 hover:border-b hover:border-b-offset-4"><ion-icon class="text-black" name="basket-outline"></ion-icon><a href="" data-page="orders" class="ml-4 hover:text-gray-700 ">Orders</a></li>
                <li class="mb-15 font-bold text-gray-600 hover:border-b hover:border-b-offset-4"><ion-icon class="text-black" name="cube-outline"></ion-icon><a href="" data-page="category" class="ml-4 hover:text-gray-700 ">Category</a></li>
                <li class="mb-15 font-bold text-gray-600 hover:border-b hover:border-b-offset-4"><ion-icon class="text-black" name="people-outline"></ion-icon><a href="" data-page="customers" class="ml-4 hover:text-gray-700 ">Customers</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-2">
            <div id="content">
            <?php 
                $folder = $_GET['folder'] ?? '';
                $page = $_GET['page'] ?? 'dashboard';
                $page = basename($page);
                  
                  if (file_exists("admin_components/{$folder}/{$page}.php")) {
                    include "admin_components/{$folder}/{$page}.php";
                } else {
                    echo "Page not found.";
                }
            ?> <!-- Default content -->
            </div>
        </div>
    </div>
    
    <script>
        function redirectToLogin() {
            window.location.href = 'login.php'; // Redirect to login page
        }
    </script>
    <script src="script.js"></script>
</body>
</html>