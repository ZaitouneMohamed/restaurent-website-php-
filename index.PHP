<?php
include('admin/connection.php');
ob_start();
session_start();
//error_reporting(0);
$query1 = $pdo->prepare("SELECT * FROM `categorie_table` LIMIT 3");
$query1->execute();
$categories = $query1->fetchAll(PDO::FETCH_ASSOC);


$query2 = $pdo->prepare("SELECT * FROM `food` limit 6");
$query2->execute();
$foods = $query1->fetchAll(PDO::FETCH_ASSOC);


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
    // $query1 = mysqli_query($con, "SELECT * FROM `categorie_table` LIMIT 3");
    //$row=mysqli_fetch_assoc($query1);
    ?>
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Categorie</h2>
            <div class="row">
                <?php foreach ($categories as $item) : ?>
                    <div class="col-4">
                        <div class="card" style="width: 18rem;">
                            <img src="./admin/images/categorie/<?= $item['image_name'] ?>" width="80px" height="200px" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title"><?= $item['title'] ?></h5>
                                <a href="food_of_categorie.php?id=<?= $item['id'] ?>" class="btn btn-primary">See Food</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach;  ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->

    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <div class="row">
                <?php foreach ($foods as $food) :  ?>
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <img src="./admin/images/foods/<?= $food['image_name'] ?>" width="80px" height="200px" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title"><?= $food['title'] ?></h5>

                            </div>
                        </div>
                    </div>
                <?php endforeach;  ?>
            </div>




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