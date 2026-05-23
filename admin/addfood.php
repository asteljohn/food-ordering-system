<?php
include '../db.php';

$name = $_POST['food_name'];
$price = $_POST['price'];
$category = $_POST['category'];

$sql = "INSERT INTO food_items(food_name,price,category)
VALUES('$name','$price','$category')";

mysqli_query($conn, $sql);

echo "Food Added";
?>