
<?php 

    session_start();
    include("admin/connection.php");
    $id=$_GET["id"];
    $req=mysqli_query($con,"delete from orders where id=$id");
  
    echo '<script> location.replace("my_orders.php"); </script>';
?>