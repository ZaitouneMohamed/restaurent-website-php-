<!DOCTYPE html>
<?php
include('admin/connection.php');
session_start();
$categorie_id = $_GET["id"];
?>
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
    include("includes/navbar.php");
    ?>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">

            <h2>Foods on Your Search <a href="#" class="text-red">"<?php echo $categorie_id; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
    <div class="container">
        <div class="row">

        <?php
        $req_of_search = mysqli_query($con, "SELECT * FROM `food` WHERE categorie_id = '$categorie_id' ");
        while ($row = mysqli_fetch_array($req_of_search)) {
            $id = $row[0];
            echo ("
                    <div class='col-4'>
                    <div class='food-menu-img'>
                        <img src='admin/images/foods/$row[4]' alt='Chicke Hawain Pizza' class='img-responsive img-curve'>
                    </div>

                    <div class='food-menu-desc'>
                        <h4>$row[1]</h4>
                        <h2>$row[2]</h2>
                        <h2>$row[3]$</h2>
                        <br>

                        <a href='order.php?id=$row[0]' class='btn btn-primary'>Order Now</a>
                    </div>
                </div>");
        }

        ?>
        </div>
    </div>
    <div class="clearfix"></div>



    </div>

    </section> -->

    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By </p>
        </div>
    </section>
    <!-- footer Section Ends Here -->

</body>

</html>