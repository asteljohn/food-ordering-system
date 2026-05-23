<?php
include 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = md5($_POST['password']);

$sql = "INSERT INTO users(name,email,password,role)
VALUES('$name','$email','$password','user')";

mysqli_query($conn, $sql);

echo "Registration Successful";
?>