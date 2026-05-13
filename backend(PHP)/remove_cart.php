<?php
session_start();
include("db.php");
global $conn;

$user_id = $_SESSION['user_id'];
$id = intval($_GET['id']);

mysqli_query($conn, 
"DELETE FROM cart WHERE id=$id AND user_id='$user_id'"
);

echo "success";
?>