<?php

include 'db.php';

$email = $_POST['email'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM users
WHERE email='$email'
AND password='$password'";

$result = mysqli_query($conn, $sql);

$count = mysqli_num_rows($result);

if($count > 0){

    echo "Login Successful";

} else {

    echo "Invalid Email or Password";

}

?>