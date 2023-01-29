<?php include('admin/connection.php');
    $food_id = $_GET["id"];
    date_default_timezone_set("Africa/Casablanca");
    session_start();
    if (!isset($_SESSION["username"])) {
        header("location:login.php");
    }
        $username = $_SESSION["username"];
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
        
        include("includes/navbar.php");
        $req_of_search = mysqli_query($con, "SELECT * FROM `food` WHERE id = $food_id ");
        $row = mysqli_fetch_array($req_of_search);
        echo ("
            <form class='order' method='post'>
                    <fieldset>
                        <legend>Selected Food</legend>

                        <div class='food-menu-img'>
                            <img src='admin/images/$row[4]'class='img-responsive img-curve'>
                        </div>

                        <div class='food-menu-desc'>
                        <h3>$row[1] </h3>
                        <p class='food-price'>$$row[3]</p>
                            <div class='order-label'>Quantity</div>
                            <input type='number' name='qua' class='input-responsive' value='1' required>
                        </div>
                    </fieldset>

                    <fieldset>
                ");
?>
                        <?php
                        $query_get_values = mysqli_query($con, "SELECT `mobile`, `adresse` FROM `tbl_client` WHERE username='$username'");

                        $row = mysqli_fetch_array($query_get_values);
                        if ($row[0] == "null" || $row[1] == "null") {
                            echo ("
                                    <div class='order-label'>Phone Number</div>
                                    <input type='tel' name='contact' placeholder='E.g. 9843xxxxxx' class='input-responsive' required>
                                    <div class='order-label'>Address</div>
                                    <textarea name='address' rows='10' placeholder='E.g. Street, City, Country' class='input-responsive' required></textarea>
                                    <input type='submit' name='submit' value='Confirm Order' class='btn btn-primary'> 
                                ");
                        } else {

                            echo ("
                                        <div class='order-label'>Phone Number</div>
                                        <input type='tel' name='contact' value='$row[0]' class='input-responsive' required>
                                        <div class='order-label'>Address</div>
                                        <textarea name='address' rows='10'  class='input-responsive' required>$row[1]</textarea>
                                        <input type='submit' name='submit' value='Confirm Order' class='btn btn-primary'> 
                                    ");
                        }
                        ?>
                    </fieldset>
                </form>


        <!-- fOOD sEARCH Section Ends Here -->

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
                <p>All rights reserved. Designed By <a href="#">Vijay Thapa</a></p>
            </div>
        </section>
        <!-- footer Section Ends Here -->

    </body>

    </html>