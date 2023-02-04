<?php
session_start();


include("connection.php");

$id = $_GET["id"];
$table = $_GET["table"];

if ($table == "food") {
    $check = mysqli_query($con, "select * from orders where food_id = $id");
    $c = mysqli_num_rows($check);
    if ($c > 0) {
        echo ' <script> location.replace("index.php"); </script>';
    } else {
        $req2 = mysqli_query($con, "select * from food where id=$id limit 1");
        if ($row = mysqli_fetch_array($req2)) {
            $image = $row['image_name'];
        }
        $folder = "images/foods/";
        unlink($folder . $image);


        $req = mysqli_query($con, "DELETE FROM `food` WHERE id = '$id' ");
        echo ' <script> location.replace("manage_food.php"); </script>';
    }
} elseif ($table == "message") {
    $req=mysqli_query($con,"delete from messages where id=$id");
    header("location:msg.php");
}elseif ($table == 'categorie') {
    $check = mysqli_query($con, "select * from food where categorie_id = $id");
    $c = mysqli_num_rows($check);
    if ($c > 0) {
         echo ' <script> location.replace("index.php"); </script>';
    }else {
            
    $req2=mysqli_query($con,"select * from categorie_table where id=$id limit 1");
    if ($row = mysqli_fetch_array($req2)) {
        $image = $row['image_name'];
    }
    $folder = "images/categorie/";
    unlink($folder.$image);

    $req=mysqli_query($con,"delete from categorie_table where id=$id");
    header("location:manage_categorie.php");
    }
}elseif ($table=="admin") {
    $req=mysqli_query($con,"delete from admin_table where id=$id");
    
    header("location:manage_admin.php");
}