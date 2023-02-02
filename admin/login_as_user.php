<?php session_start();
include("connection.php");
$id = $_GET["id"];

$result = mysqli_query($con, "select * from tbl_client where id=$id limit 1");

$row = mysqli_fetch_assoc($result);
$_SESSION['username'] = $row['username'];
$_SESSION['user_id'] = $row['id'];
$_SESSION['email'] = $row['email'];

echo ' <script> location.replace("../index.PHP"); </script>';
