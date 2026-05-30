<?php
include '../db.php';
$result = mysqli_query($conn, "SELECT * FROM food_items");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Food Menu</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,sans-serif;
}
body{
    background: linear-gradient(to right,#ff6b6b,#ffb347);
    padding:40px;
}
h2{
    text-align:center;
    color:white;
    margin-bottom:20px;
    font-size:40px;
}
.cart-link{
    text-align:center;
    margin-bottom:25px;
}
.cart-link a{
    background:white;
    color:#ff5722;
    padding:12px 20px;
    border-radius:10px;
    text-decoration:none;
    font-weight:bold;
}
.menu-container{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:25px;
}
.food-card{
    background:white;
    padding:25px;
    border-radius:20px;
    text-align:center;
}
.food-card img{
    width:120px;
    height:120px;
    object-fit:cover;
    border-radius:12px;
    margin-bottom:15px;
}
.food-card h3{
    color:#ff5722;
    margin-bottom:10px;
}
.price{
    font-size:22px;
    margin-bottom:20px;
}
.btn{
    background:#ff5722;
    color:white;
    border:none;
    padding:10px 15px;
    border-radius:8px;
    cursor:pointer;
    margin:5px;
}
.qty-box{
    margin-top:10px;
}
</style>
</head>
<body>

<h2>🍴 Food Menu</h2>

<div class="cart-link">
<a href="/food-ordering-system/templates/cart.html">
🛒 View Cart (<span id="cart-count">0</span>)
</a>
</div>

<div class="menu-container">

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<div class="food-card">

<img src="/food-ordering-system/uploads/<?php echo $row['image']; ?>" alt="food">

<h3><?php echo $row['food_name']; ?></h3>

<p class="price">₹<?php echo $row['price']; ?></p>

<button class="btn"
onclick="addToCart('<?php echo $row['food_name']; ?>', <?php echo $row['price']; ?>)">
Add to Cart
</button>

<div class="qty-box">
<button class="btn" onclick="increaseQty('<?php echo $row['food_name']; ?>')">+</button>
<button class="btn" onclick="decreaseQty('<?php echo $row['food_name']; ?>')">-</button>
<button class="btn" onclick="removeItem('<?php echo $row['food_name']; ?>')">Remove</button>
</div>

</div>

<?php } ?>

</div>

<script>
function addToCart(name,price){
let cart=JSON.parse(localStorage.getItem("cart"))||[];
let existing=cart.find(item=>item.name===name);

if(existing){
existing.qty+=1;
}else{
cart.push({name:name,price:price,qty:1});
}

localStorage.setItem("cart",JSON.stringify(cart));
updateCartCount();
}

function increaseQty(name){
let cart=JSON.parse(localStorage.getItem("cart"))||[];
let item=cart.find(i=>i.name===name);
if(item) item.qty+=1;
localStorage.setItem("cart",JSON.stringify(cart));
updateCartCount();
}

function decreaseQty(name){
let cart=JSON.parse(localStorage.getItem("cart"))||[];
let item=cart.find(i=>i.name===name);

if(item){
item.qty--;
if(item.qty<=0){
cart=cart.filter(i=>i.name!==name);
}
}

localStorage.setItem("cart",JSON.stringify(cart));
updateCartCount();
}

function removeItem(name){
let cart=JSON.parse(localStorage.getItem("cart"))||[];
cart=cart.filter(item=>item.name!==name);
localStorage.setItem("cart",JSON.stringify(cart));
updateCartCount();
}

function updateCartCount(){
let cart=JSON.parse(localStorage.getItem("cart"))||[];
let total=0;
cart.forEach(item=> total += item.qty);
document.getElementById("cart-count").innerText=total;
}

updateCartCount();
</script>

</body>
</html>