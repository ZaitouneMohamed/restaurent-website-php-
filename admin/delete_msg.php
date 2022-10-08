
<?php session_start();
    include("connection.php");

    $id=$_GET["id"];
    $req=mysqli_query($con,"delete from tbl_msg where id=$id");
    
    header("location:msg.php");
    
?>