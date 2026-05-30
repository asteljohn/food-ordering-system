<?php
session_start();

$admin_password = "Astel@food123"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $password = $_POST['password'];

    if ($password === $admin_password) {
        $_SESSION['admin'] = true;
        header("Location: users.php");
        exit();
    } else {
        $error = "Wrong Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>

<style>
*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
}

body{
height:100vh;
display:flex;
justify-content:center;
align-items:center;
background: linear-gradient(135deg,#f76b6b,#f8b045);
}

.login-box{
width:350px;
background:#efefef;
padding:40px;
border-radius:20px;
text-align:center;
box-shadow:0 8px 20px rgba(0,0,0,0.2);
}

.logo{
font-size:50px;
margin-bottom:10px;
}

h2{
color:#ff5722;
margin-bottom:25px;
}

input{
width:100%;
padding:14px;
margin-bottom:20px;
border:1px solid #ccc;
border-radius:10px;
font-size:16px;
}

button{
width:100%;
padding:14px;
background:#ff5722;
color:white;
border:none;
border-radius:10px;
font-size:18px;
cursor:pointer;
}

.error{
color:red;
margin-bottom:15px;
}
</style>
</head>

<body>

<div class="login-box">

<div class="logo">🍔</div>

<h2>Admin Login</h2>

<?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>

<form method="POST">
<input
type="password"
name="password"
placeholder="Enter Admin Password"
required
>

<button type="submit">Login</button>
</form>

</div>

</body>
</html>