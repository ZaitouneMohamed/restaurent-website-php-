
<?php 
session_start();
    include("connection.php");
    
    $id=$_GET["id"];
    $req=mysqli_query($con,"delete from categorie_table where id=$id");
    
    header("location:manage_categorie.php");

?>