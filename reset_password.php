<?php
require 'config.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Validate token
    $stmt = $conn->prepare("SELECT * FROM register_tb WHERE reset_token = ? AND token_expiry > NOW()");
    $stmt->execute([$token]);
    $user = $stmt->fetch();

    if ($user) {
        if (isset($_POST['reset_password'])) {
            $new_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE register_tb SET password = ?, reset_token = NULL, token_expiry = NULL WHERE reset_token = ?");
            $stmt->execute([$new_password, $token]);

            echo "Password reset successfully! <a href='login.php'>Login</a>";
            exit();
        }
    } else {
        die("Invalid or expired token.");
    }
} else {
    die("No token provided.");
}
?>

<form action="" method="post">
    <h2>Reset Password</h2>
    <input type="password" name="password" placeholder="New Password" required>
    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
    <input type="submit" name="reset_password" value="Reset Password">
</form>
