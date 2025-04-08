<?php

session_start();

$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];
$activeForm = $_SESSION['active_form'] ?? 'login';

session_unset();

function showError($error){
    return !empty($error) ? "<p class='bg-red-200 text-red-700 p-3 rounded text-center'>$error</p>" : '';
}

function isActiveForm($formName, $activeForm){
    return $formName === $activeForm ? 'block' : 'hidden';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="flex justify-start items-center min-h-screen bg-white text-gray-700 font-[Poppins, sans-serif] ">
    <main class=" w-full">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('img/ecomers_bg.avif'); opacity: 1; z-index: -1;"></div>
        
        <div class="container ml-[-150px]">
            <!-- Login Form -->
            <div role="form-box" class="<?= isActiveForm('login', $activeForm); ?> max-w-md mx-auto p-8 bg-white rounded-lg shadow-md" id="show_Login">
                <form action="login_register.php" method="post">
                    <h1 class="text-2xl font-bold text-center mb-5">Login</h1>
                    <?= showError($errors['login']);?>
                    <input class="w-full p-3 mb-4 rounded bg-gray-300 focus:outline-none" type="email" name="email" placeholder="Email" required>
                    <input class="w-full p-3 mb-4 rounded bg-gray-300 focus:outline-none" type="password" name="password" placeholder="Password" required>
                    <button class="w-full p-3 rounded bg-green-500 text-white font-bold hover:bg-green-600 transition" type="submit" name="login">Login</button>
                </form>
                <div class="text-center mt-3">
                    <p>Don't have an account? <a href="#" onclick="onToggle('show_Register', event)" class="text-green-500 hover:underline">Register</a></p>
                    <a href="#" onclick="onToggle('show_ForgotPassword', event)" class="text-green-500 hover:underline">Forgot Password?</a>
                </div>
            </div>

            <!-- Forgot Password -->
            <div role="form-box" class="hidden max-w-md mx-auto p-8 bg-white rounded-lg shadow-md" id="show_ForgotPassword">
                <form action="forgot_password.php" method="post">
                    <h1 class="text-2xl font-bold text-center mb-5">Forgot Password</h1>
                    <p class="text-center mb-4">Enter your email to receive a password reset link.</p>
                    <input class="w-full p-3 mb-4 rounded bg-gray-300 focus:outline-none" type="email" name="email" placeholder="Email" required>
                    <button class="w-full p-3 rounded bg-green-500 text-white font-bold hover:bg-green-600 transition" type="submit" name="forgot_password">Send Reset Link</button>
                </form>
            </div>

            <!-- Register Form -->
            <div role="form-box" class="<?= isActiveForm('register', $activeForm); ?> max-w-md mx-auto p-8 bg-white rounded-lg shadow-md" id="show_Register">
                <form action="login_register.php" method="post">
                    <h1 class="text-2xl font-bold text-center mb-5">Register</h1>
                    <?= showError($errors['register']);?>
                    <input class="w-full p-3 mb-4 rounded bg-gray-300 focus:outline-none" type="text" name="fullname" placeholder="Full Name">
                    <input class="w-full p-3 mb-4 rounded bg-gray-300 focus:outline-none" type="email" name="email" placeholder="Email" required>
                    <input class="w-full p-3 mb-4 rounded bg-gray-300 focus:outline-none" type="tel" name="contact" placeholder="Contact Number" required>
                    <input class="w-full p-3 mb-4 rounded bg-gray-300 focus:outline-none" type="password" name="password" placeholder="Password" required>
                    <input class="w-full p-3 mb-4 rounded bg-gray-300 focus:outline-none" type="password" name="confirm_password" placeholder="Confirm Password" required>
                    <button class="w-full p-3 rounded bg-green-500 text-white font-bold hover:bg-green-600 transition" type="submit" name="register">Register</button>
                </form>
                <div class="text-center mt-3">
                    <p>Already have an account? <a href="#" onclick="onToggle('show_Login', event)" class="text-green-500 hover:underline">Login</a></p>
                </div>
            </div>
        </div>
    </main>
    <script src="script.js"></script>
</body>
</html>
