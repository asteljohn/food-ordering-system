<?php
include '../db.php';

// Simple query using customer_name directly
$sql = "SELECT id, customer_name, food_name, quantity, total_price FROM orders ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Customer Orders</title>
<style>
body{
    margin:0;
    font-family:Arial,sans-serif;
    background:linear-gradient(135deg,#ff416c,#ff4b2b);
}
.wrapper{
    display:flex;
    min-height:100vh;
}
/* SIDEBAR */
.sidebar{
    width:250px;
    background:#1f1f1f;
    position:fixed;
    left:0;
    top:0;
    height:100vh;
    padding-top:30px;
}
.sidebar h2{
    color:white;
    text-align:center;
    margin-bottom:30px;
}
.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:15px 25px;
    font-size:18px;
}
.sidebar a:hover{
    background:#ff5a1f;
}
/* RIGHT CONTENT */
.main-content{
    margin-left:250px;
    width:calc(100% - 250px);
    padding:40px;
}
.container{
    background:white;
    border-radius:20px;
    padding:35px;
    box-shadow:0 8px 25px rgba(0,0,0,0.15);
}
h2{
    text-align:center;
    color:#ff5a1f;
    margin-bottom:25px;
}
table{
    width:100%;
    border-collapse:collapse;
    background:white;
}
th{
    background:#fff3ee;
    color:#ff5a1f;
    padding:16px;
    text-align:left;
}
td{
    padding:16px;
    border-bottom:1px solid #eee;
}
</style>
</head>
<body>

<div class="wrapper">

    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="/food-ordering-system/admin/users.php">Registered Users</a>
        <a href="/food-ordering-system/admin/foodlist.php">Customer Orders</a>
        <a href="/food-ordering-system/admin/addfood.html">Add Food Item</a>
        <a href="/food-ordering-system/admin/manage-menu.php">Manage Menu</a>
    </div>

    <div class="main-content">
        <div class="container">
            <h2>🍕 Customer Orders</h2>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Food Item</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                </tr>

                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['customer_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['food_name']); ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td>₹<?php echo $row['total_price']; ?></td>
                </tr>
                <?php } ?>

            </table>
        </div>
    </div>

</div>

</body>
</html>