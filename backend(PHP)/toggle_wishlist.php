<?php
session_start();
include("db.php");
global $conn;

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];

// already wishlist mein hai?
$check = mysqli_query($conn, "SELECT * FROM wishlist WHERE user_id='$user_id' AND product_id='$product_id'");

if(mysqli_num_rows($check) > 0) {
  // remove
  mysqli_query($conn, "DELETE FROM wishlist WHERE user_id='$user_id' AND product_id='$product_id'");
  echo "removed";
} else {
  // add
  mysqli_query($conn, "INSERT INTO wishlist (user_id, product_id) VALUES ('$user_id', '$product_id')");
  echo "added";
}
?>