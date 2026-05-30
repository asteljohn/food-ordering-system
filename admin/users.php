<?php
include '../db.php';

$result = mysqli_query($conn, "SELECT id, name, email FROM users");
?>

<!DOCTYPE html>
<html>
<head>
<title>Registered Users</title>

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

.sidebar{
    width:250px;
    background:#222;
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
    padding:15px 25px;
    text-decoration:none;
    font-size:18px;
}

.sidebar a:hover{
    background:#ff5a1f;
}

.main-content{
    flex:1;
    padding:40px;
}

.container{
    width:95%;
    margin:auto;
    background:#f5f5f5;
    border-radius:20px;
    padding:40px;
}

h1{
    text-align:center;
    color:#ff5a1f;
    margin-bottom:30px;
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

    <a href="/food-ordering-system/admin/foodlist.php">Customer Orders</a>
    <a href="/food-ordering-system/admin/addfood.html">Add Food Item</a>
    <a href="/food-ordering-system/admin/manage-menu.php">Manage Menu</a>
    <a href="/food-ordering-system/admin/users.php">Registered Users</a>
</div>

<div class="main-content">
<div class="container">

<h1>Registered Users</h1>

<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td>
<a class="delete-btn" href="deleteuser.php?id=<?php echo $row['id']; ?>">
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