<?php session_start();
    include("connection.php");
    $id=$_GET["id"];

    $req2=mysqli_query($con,"select * from food where id=$id limit 1");
    if ($row = mysqli_fetch_array($req2)) {
        $image = $row['image_name'];
    }
    $folder = "images/foods/";
    unlink($folder.$image);


    $req=mysqli_query($con,"DELETE FROM `food` WHERE id = '$id' ");
    
    echo ' <script> location.replace("manage_food.php"); </script>';
?>