<?php
$host = "localhost";
$uname = "root";
$pwd = "";
$dbname = "leafora";

$conn = mysqli_connect($host, $uname, $pwd, $dbname);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>