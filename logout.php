<?php
require_once "session_start.php";

// Preserve specific session values (like cart or preferences)
$preserve = [];
if (isset($_SESSION['cart'])) {
    $preserve['cart'] = $_SESSION['cart'];
}
if (isset($_SESSION['preferences'])) {
    $preserve['preferences'] = $_SESSION['preferences'];
}

// Clear all session variables
session_unset();
session_destroy();

// Start a new session and restore preserved data
session_start();
foreach ($preserve as $key => $value) {
    $_SESSION[$key] = $value;
}

// Redirect to homepage
header("Location: homepage.php");
exit();

// Clear all session data
unset($_SESSION['user_id']);
unset($_SESSION['cart']); // <-- this line is key
session_destroy();

header("Location: login.php");
exit();