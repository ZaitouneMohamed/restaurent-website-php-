
<?php 
    session_start();
    include("connection.php");
    
    $id=$_GET["id"];
    
    
    $req2=mysqli_query($con,"select * from categorie_table where id=$id limit 1");
    if ($row = mysqli_fetch_array($req2)) {
        $image = $row['image_name'];
    }
    echo $image;
    $folder = "images/categorie/";
    unlink($folder.$image);

    $req=mysqli_query($con,"delete from categorie_table where id=$id");

    
    header("location:manage_categorie.php");
