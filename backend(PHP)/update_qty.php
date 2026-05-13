<?php
include("db.php");
global $conn;

$id = $_GET['id'];
$type = $_GET['type'];

if($type == "inc"){
    mysqli_query($conn, "UPDATE cart SET quantity = quantity + 1 WHERE id=$id");
}

if($type == "dec"){
    mysqli_query($conn, "UPDATE cart SET quantity = quantity - 1 WHERE id=$id AND quantity > 1");
}
?>