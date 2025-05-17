<?php

require_once "session_start.php";
require_once "config.php";

if(isset($_POST['register'])){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $checkEmail = $conn->query("SELECT email FROM register_tb WHERE email = '$email'");
    if($checkEmail->num_rows > 0){
        $_SESSION['register_error'] = 'Email is already taken';
        $_SESSION['active_form'] = 'register';
        header("Location: login&register.php");
        exit();
    } else {
        $conn->query("INSERT INTO register_tb (fullname,email,contact,password) VALUES ('$fullname','$email','$contact','$password')");

        $userId = $conn->insert_id;

        $_SESSION['user_id'] = $userId;
        $_SESSION['fullname'] = $fullname;
        $_SESSION['email'] = $email;
        $_SESSION['is_admin'] = 0;

        header("Location: homepage.php");
        exit();
    }
}


if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM register_tb WHERE email = '$email'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['is_admin'] = $user['is_admin'];

            // ✅ STEP 4: Restore cart from DB
            $user_id = $user['id'];
            $cartQuery = $conn->prepare("SELECT * FROM user_carts WHERE user_id = ?");
            $cartQuery->bind_param("i", $user_id);
            $cartQuery->execute();
            $cartResult = $cartQuery->get_result();

            $_SESSION['cart'] = []; // Reset existing session cart

            while ($row = $cartResult->fetch_assoc()) {
                $_SESSION['cart'][$row['product_key']] = [
                    'name' => $row['name'],
                    'price' => $row['price'],
                    'quantity' => $row['quantity'],
                    'category' => $row['category']
                ];
            }
            $cartQuery->close();

            // Redirect based on admin status
            if ($user['is_admin'] == 1) {
                header("Location: adminpage.php"); 
            } else {
                header("Location: homepage.php"); 
            }
            exit();
        }
    }

    // Invalid login
    $_SESSION['login_error'] = 'Invalid email or password';
    $_SESSION['active_form'] = 'login';
    header("Location: login&register.php");
    exit();
}

?>