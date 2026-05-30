<?php
include '../db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registered Users</title>
    <style>
        body{
            margin:0;
            padding:0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg,#ff512f,#dd2476);
        }

        .container{
            width:80%;
            margin:50px auto;
            background:white;
            padding:30px;
            border-radius:12px;
            box-shadow:0 4px 10px rgba(0,0,0,0.2);
        }

        h2{
            text-align:center;
            margin-bottom:20px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        th, td{
            padding:12px;
            border:1px solid #ddd;
            text-align:center;
        }

        th{
            background:#f2f2f2;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Registered Users</h2>
    <a href="/food-ordering-system/admin/register-users.php">Registered Users</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>

        <?php
        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['email']."</td>
                  </tr>";
        }
        ?>
    </table>
</div>

</body>
</html>