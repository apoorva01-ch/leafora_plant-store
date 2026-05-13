<?php
session_start();
include("db.php");

if(!isset($_SESSION['user_id'])){
    echo 0;
    exit();
}

$user_id = $_SESSION['user_id'];

$result = mysqli_query($conn, "SELECT COUNT(*) as total FROM cart WHERE user_id='$user_id'");
$data = mysqli_fetch_assoc($result);

echo $data['total'];
?>