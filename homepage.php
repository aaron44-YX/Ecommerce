  <?php require('./components/partials/head.php')?>
    <?php require('./components/partials/nav.php')?>

    <main class="relative text-center text-white">
        <div class="absolute inset-0 top-[-48px] bg-cover bg-center opacity-30" style="background-image: url('./img/vr.jpg');"></div>
        <h1 class="relative mt-12 text-4xl font-bold max-w-lg mx-auto">Fast Shipping, Great Prices Find What You Love Today!</h1>
        <div class="relative flex flex-wrap justify-center gap-6 p-10">
            <div class="bg-white w-72 h-96 p-4 text-center transform transition-transform hover:scale-105 cursor-pointer" onclick="window.location.href='/ecommerce_project/components/mobile_accessorypage.php';">
                <h2 class="font-bold text-gray-700 text-lg">Mobiles Accessories</h2>
                <img src="/ecommerce_project/img/tripod.jpg" alt="" class="w-60 h-72 object-contain mx-auto mt-2">
                <h5 class="text-green-600 text-sm hover:text-black cursor-pointer">See more</h5>
            </div>
            <div class="bg-white w-72 h-96 p-4 text-center transform transition-transform hover:scale-105 cursor-pointer" onclick="window.location.href='/ecommerce_project/components/free_shipping_page.php';">
                <h2 class="font-bold text-gray-700 text-lg">Free Shipping</h2>
                <img src="/ecommerce_project/img/freeshiping.png" alt="" class="w-60 h-72 object-contain mx-auto mt-2">
                <h5 class="text-green-600 text-sm hover:text-black cursor-pointer">Learn more</h5>
            </div>
            <div class="bg-white w-72 h-96 p-4 text-center transform transition-transform hover:scale-105 cursor-pointer" onclick="window.location.href='/ecommerce_project/components/gaming_page.php';">
                <h2 class="font-bold text-gray-700 text-lg">Get your Gaming Gear!</h2>
                <img src="/ecommerce_project/img/gaming_gear.jpg" alt="" class="w-60 h-72 object-contain mx-auto mt-2">
                <h5 class="text-green-600 text-sm hover:text-black cursor-pointer">Shop gaming</h5>
            </div>
            <div class="bg-white w-72 h-96 p-4 text-center transform transition-transform hover:scale-105 cursor-pointer" onclick="window.location.href='/ecommerce_project/components/school_supply_page.php';">
                <h2 class="font-bold text-gray-700 text-lg">School Supplies</h2>
                <img src="/ecommerce_project/img/schoolsup.webp" alt="" class="w-60 h-72 object-contain mx-auto mt-2">
                <h5 class="text-green-600 text-sm hover:text-black cursor-pointer">Shop School Products</h5>
            </div>
            <div class="bg-white w-72 h-96 p-4 text-center transform transition-transform hover:scale-105 cursor-pointer" onclick="window.location.href='/ecommerce_project/components/fashion_page.php';">
                <h2 class="font-bold text-gray-700 text-lg">Shop deals in Fashion</h2>
                <img src="/ecommerce_project/img/fashion.jpg" alt="" class="w-60 h-72 object-contain mx-auto mt-2">
                <h5 class="text-green-600 text-sm hover:text-black cursor-pointer">See all Deals</h5>
            </div>
            <div class="bg-white w-72 h-96 p-4 text-center transform transition-transform hover:scale-105 cursor-pointer" onclick="window.location.href='/ecommerce_project/components/kitchen_page.php';">
                <h2 class="font-bold text-gray-700 text-lg">Kitchen Appliances</h2>
                <img src="/ecommerce_project/img/kitchen_app.jpg" alt="" class="w-60 h-72 object-contain mx-auto mt-2">
                <h5 class="text-green-600 text-sm hover:text-black cursor-pointer">Explore all products in Kitchen</h5>
            </div>
            <div class="bg-white w-72 h-96 p-4 text-center transform transition-transform hover:scale-105 cursor-pointer" onclick="window.location.href='/ecommerce_project/components/home_essentials_page.php';">
                <h2 class="font-bold text-gray-700 text-lg">Home Essentials</h2>
                <img src="/ecommerce_project/img/home_ess.jpg" alt="" class="w-60 h-72 object-contain mx-auto mt-2">
                <h5 class="text-green-600 text-sm hover:text-black cursor-pointer">Shop the latest from Home</h5>
            </div>
            <div class="bg-white w-72 h-96 p-4 text-center transform transition-transform hover:scale-105 cursor-pointer" onclick="window.location.href='/ecommerce_project/components/branded_page.php';">
                <h2 class="font-bold text-gray-700 text-lg">Branded Deals</h2>
                <img src="/ecommerce_project/img/branded_products.png" alt="" class="w-60 h-72 object-contain mx-auto mt-2">
                <h5 class="text-green-600 text-sm hover:text-black cursor-pointer">Check out Branded Products</h5>
            </div>
        </div>
    </main>
    <?php require('./components/partials/footer.php')?>