<?php 
session_start();

    include("connection.php");
    
    $id=$_GET["id"];
    $pdo = pdo_connect_mysql();
    $query = $pdo->prepare('DELETE FROM admin_table WHERE id =' . $id);
    $query->execute();
    header("location:manage_admin.php");

