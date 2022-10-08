<?php
include('admin/connection.php');
session_start(); 
if(!isset($_SESSION["username"])){
    header("location:login.php");
}
else{
    $query_get_categorie=mysqli_query($con,"SELECT * FROM `categorie_table` ");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <?php
        include ("includes/navbar.php");
    ?>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"Category"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
            while($row=mysqli_fetch_array($query_get_categorie)){
                $id=$row[0];
                echo 
                ("
                <div class='food-menu-box'>
                    <div class='food-menu-img'>
                        <img src='admin/images/$row[2]' alt='Chicke Hawain Pizza' class='img-responsive img-curve'>
                    </div>

                    <div class='food-menu-desc'>
                        <h4>$row[1]</h4>
                        <br>
                        <a href='categorie.php?id=$id' class='btn btn-primary'>see more</a>
                    </div>
                </div>
                ");

            }
            ?>
            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- fOOD Menu Section Ends Here -->
    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">Vijay Thapa</a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->

</body>
</html>
<?php }?>