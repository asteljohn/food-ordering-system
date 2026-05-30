<?php
include '../db.php';

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn,"DELETE FROM food_items WHERE id=$id");
}

$result = mysqli_query($conn,"SELECT * FROM food_items");
?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Menu - Rio Ordering</title>

<style>
body{
    margin:0;
    font-family:Arial,sans-serif;
    background:linear-gradient(135deg,#ff416c,#ff4b2b);
}

/* PAGE LAYOUT */
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
    height:100%;
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

/* CONTENT */
.main-content{
    margin-left:250px;
    width:calc(100% - 250px);
    padding:40px;
}

.container{
    background:#ffffff;
    border-radius:20px;
    padding:35px;
    box-shadow:0 8px 25px rgba(0,0,0,0.15);
}

h1{
    text-align:center;
    color:#ff5a1f;
    margin-bottom:25px;
}

/* TABLE */
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

/* IMAGE */
.food-img{
    width:80px;
    height:80px;
    object-fit:cover;
    border-radius:10px;
}

/* DELETE BUTTON */
.delete-btn{
    background:#ff5a1f;
    color:white;
    padding:10px 16px;
    border-radius:8px;
    text-decoration:none;
}

.delete-btn:hover{
    background:#e64912;
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

            <h1>🍕 Manage Menu</h1>

            <table>
                <tr>
                    <th>Image</th>
                    <th>Food Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>

                <?php while($row=mysqli_fetch_assoc($result)){ ?>

                <tr>
                    <td>
                        <img src="../uploads/<?php echo $row['image']; ?>" class="food-img">
                    </td>

                    <td><?php echo $row['food_name']; ?></td>

                    <td>₹<?php echo $row['price']; ?></td>

                    <td>
                        <a class="delete-btn"
                           href="?delete=<?php echo $row['id']; ?>"
                           onclick="return confirm('Delete this item?')">
                           Delete
                        </a>
                    </td>
                </tr>

                <?php } ?>

            </table>

        </div>
    </div>

</div>

</body>
</html>