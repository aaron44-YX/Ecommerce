<?php

session_start();
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
    }else{
        $conn->query("INSERT INTO register_tb (fullname,email,contact,password) VALUES ('$fullname','$email','$contact','$password')");
    }
    header("Location: ./components/homepage.php");
    exit();
}

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM register_tb WHERE email = '$email'");
    if($result->num_rows > 0){
        $user = $result->fetch_assoc();
        if(password_verify($password, $user['password'])){
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['is_admin'] = $user['is_admin'];

            if ($user['is_admin'] == 1) {
                header("Location: adminpage.php"); 
            } else {
                header("Location: ./components/homepage.php"); 
            }
            exit();
        }

    }
    $_SESSION['login_error'] = 'Invalid email or password';
    $_SESSION['active_form'] = 'login';
    header("Location: login&register.php");
    exit();
}
?>