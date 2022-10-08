
<?php session_start();
    include("connection.php");
    $id=$_GET["id"];
    $req=mysqli_query($con,"delete from food where id=$id");
    
    header("location:manage_food.php");
?>