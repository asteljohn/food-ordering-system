<?php
session_start();
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $food_name = $_POST['food_name'];
    $quantity = $_POST['quantity'];
    $total_price = $_POST['total_price'];

    // use session name if logged in, fallback to "Guest"
    $customer_name = isset($_SESSION['name']) ? $_SESSION['name'] : "Guest";

    $sql = "INSERT INTO orders (customer_name, food_name, quantity, total_price)
            VALUES ('$customer_name', '$food_name', '$quantity', '$total_price')";

    if(mysqli_query($conn, $sql)){
        echo "Order placed successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>