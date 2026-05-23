<?php
session_start();
include 'db.php';

$email = $_POST['email'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    echo "Login Successful";
}else{
    echo "Invalid Credentials";
}
?>