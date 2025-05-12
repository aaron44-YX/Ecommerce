<?php

$host = "localhost";
$user = "root";
$password = "Porlas111";
$database = "ecommerce_db";

$conn = new mysqli($host, $user, $password, $database);

if($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
}
?>