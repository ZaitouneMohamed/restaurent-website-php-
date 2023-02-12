<?php
include('admin/connection.php');
ob_start();
session_start();
//error_reporting(0);
// $query1 = $pdo->


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php
    include("includes/navbar.php");
    ?>
    <!-- Navbar Section Ends Here -->
    <?php
    // $query_get_burger=mysqli_query($con,"SELECT * FROM `categorie_table` WHERE title='categorie 1'");
    // $row_get_burger=mysqli_fetch_array($query_get_burger);

    // $query_get_pizza=mysqli_query($con,"SELECT * FROM `categorie_table` WHERE title='categorie 2'");
    // $row_get_pizza=mysqli_fetch_array($query_get_pizza);

    // $query_get_momo=mysqli_query($con,"SELECT * FROM `categorie_table` WHERE title='categorie 3'");
    // $row_get_momo=mysqli_fetch_array($query_get_momo);
    ?>
    <!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">

            <div class="carousel-item active">
                <img class="d-block w-100" src="admin/images/categorie/<?php echo $row_get_burger[2] ?>" alt="First slide" height="550px">
                <div class="carousel-caption d-none d-md-block">
                    <h1><?php echo $row_get_burger[1] ?></h1>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="admin/images/categorie/<?php echo $row_get_pizza[2] ?>" alt="Second slide" height="550px">
                <div class="carousel-caption d-none d-md-block">
                    <h1><?php echo $row_get_pizza[1] ?></h1>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="admin/images/categorie/<?php echo $row_get_momo[2] ?>" alt="Third slide" height="550px">
                <div class="carousel-caption d-none d-md-block">
                    <h1><?php echo $row_get_momo[1] ?></h1>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div> -->
    <!-- fOOD sEARCH Section Ends Here -->


    <!-- CAtegories Section Starts Here -->
    <?php
    $query1 = mysqli_query($con, "SELECT * FROM `categorie_table` LIMIT 3");
    //$row=mysqli_fetch_assoc($query1);
    ?>
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Categorie</h2>
            <?php
            while ($row = mysqli_fetch_array($query1)) {
                $id = $row[0];
                echo ("
                <a href='food_of_categorie.php?id=$row[0]'>
                <div class='box-3 float-container'>
                    <img src='admin/images/categorie/$row[2]' width='150px' height='350px' alt='Pizza' class='img-responsive img-curve'>
                    <h3 class='float-text text-white'>$row[1]</h3>
                </div>
                </a>
            ");
            } ?>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <?php
    $req_menu = mysqli_query($con, "SELECT * FROM `food` limit 6")
    ?>
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
            while ($row2 = mysqli_fetch_array($req_menu)) {
                $id2 = $row2[0];
                echo ("
                <div class='food-menu-box'>
                <div class='food-menu-img'>
                    <img src='admin/images/foods/$row2[4]' alt='Chicke Hawain Pizza' class='img-responsive img-curve'>
                </div>
                <div class='food-menu-desc'>
                    <h4>$row2[1]</h4>
                    <p class='food-price'>$$row2[3]</p>
                    <p class='food-detail'>
                        $row2[2]
                    </p>
                    <br>
                    <a href='order.php?id=$id' class='btn btn-primary'>Order Now</a>
                </div>
                </div>
                ");
            }
            ?>

            <div class="clearfix"></div>
        </div>


        <p class="text-center">
            <a href="foods.php">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->





    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png" /></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png" /></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png" /></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">zaitoune mohamed</a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->

</body>

</html>