<?php

require_once('connection.php');
$id = $_GET['id'];
$statue = $_GET['statue'];
$req = mysqli_query($con, "UPDATE `orders` SET `statue`='$statue' WHERE id = $id");

header("location:manage_order.php");
