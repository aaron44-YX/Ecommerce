<?php
require 'config.php';

if (isset($_POST['forgot_password'])) {
    $email = $_POST['email'];
    
 
    $stmt = $conn->prepare("SELECT * FROM register_tb WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
   
        $token = bin2hex(random_bytes(50));
        $stmt = $conn->prepare("UPDATE register_tb SET reset_token = ?, token_expiry = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email = ?");
        $stmt->execute([$token, $email]);


        $reset_link = "http://yourwebsite.com/reset_password.php?token=$token";
        $subject = "Password Reset Request";
        $message = "Click the link to reset your password: $reset_link";
        $headers = "From: no-reply@yourwebsite.com";

        mail($email, $subject, $message, $headers);

        echo "A reset link has been sent to your email.";
    } else {
        echo "No account found with that email.";
    }
}
?>
