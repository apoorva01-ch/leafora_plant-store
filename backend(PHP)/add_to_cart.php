<?php
session_start();
include("db.php");

global $conn;

$user_id = $_SESSION['user_id'];

$name = $_POST['product_name'];
$price = $_POST['product_price'];

// IMPORTANT: include user_id here
$check = mysqli_query($conn, 
"SELECT * FROM cart WHERE product_name='$name' AND user_id='$user_id'"
);

if(mysqli_num_rows($check) > 0){

    mysqli_query($conn, 
    "UPDATE cart 
     SET quantity = quantity + 1 
     WHERE product_name='$name' AND user_id='$user_id'"
    );

} else {

    mysqli_query($conn, 
    "INSERT INTO cart (user_id, product_name, product_price, quantity) 
     VALUES ('$user_id','$name','$price',1)"
    );
}

?>