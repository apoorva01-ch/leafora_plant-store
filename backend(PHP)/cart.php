<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

include("db.php");
global $conn;
?>

<h2>Your Cart</h2>

<?php
$total = 0;

$result = mysqli_query($conn, "SELECT * FROM cart");

while($row = mysqli_fetch_assoc($result)){
    $subtotal = $row['product_price'] * $row['quantity'];
    $total += $subtotal;

    echo "<div>";
    echo "<h4>".$row['product_name']."</h4>";
    echo "<p>Price: ₹".$row['product_price']."</p>";
    echo "<p>Quantity: ".$row['quantity']."</p>";
    echo "<p>Subtotal: ₹".$subtotal."</p>";
    echo "<a href='remove_cart.php?id=".$row['id']."'>Remove</a>";
    echo "</div><hr>";
}

echo "<h3>Total: ₹".$total."</h3>";
?>