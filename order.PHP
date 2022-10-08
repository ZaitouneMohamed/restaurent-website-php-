<?php include('admin/connection.php');$img=$_GET["img"];$title=$_GET["title"];$price=$_GET["price"];date_default_timezone_set("Africa/Casablanca"); ?>
<?php
session_start(); 
if(!isset($_SESSION["username"])){
    header("location:login.php");
}
else{
    $username=$_SESSION["username"];
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
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form class="order" method="post">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <img src="admin/images/<?php echo $img ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title ?></h3>
                        <p class="food-price">$<?php echo $price ?></p>

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qua" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>

                    <legend>Delivery Details</legend>
                            <div class="order-label">username</div>
                            <input type="text" name="full_name" value="<?php echo $_SESSION["username"];?>"  class="input-responsive" required>
                            <div class='order-label'>Email</div>
                            <input type='email' name='email' value="<?php echo $_SESSION['email'];?>" class='input-responsive' required>
                            <?php
                                $query_get_values=mysqli_query($con,"SELECT `mobile`, `adresse` FROM `tbl_client` WHERE username='$username'");
                                
                                $row=mysqli_fetch_array($query_get_values);
                                if($row[0]=="null"|| $row[1]=="null"){
                                echo 
                                ("
                                    <div class='order-label'>Phone Number</div>
                                    <input type='tel' name='contact' placeholder='E.g. 9843xxxxxx' class='input-responsive' required>
                                    <div class='order-label'>Address</div>
                                    <textarea name='address' rows='10' placeholder='E.g. Street, City, Country' class='input-responsive' required></textarea>
                                    <input type='submit' name='submit' value='Confirm Order' class='btn btn-primary'> 
                                ");}
                                else{
                                    
                                    echo 
                                    ("
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
            <?php
                if (isset($_POST["submit"])){
                    //  price / title
                    $quantity=$_POST["qua"];
                    $total=$quantity*$price;
                    $date_now=date("Y-m-d / h:i:sa");
                    $c_name=$_POST["full_name"];
                    $c_phone=$_POST["contact"];
                    $c_email=$_POST["email"];
                    $c_adresse=$_POST["address"];
                    $query=mysqli_query($con,"INSERT INTO `order`( `food`, `price`, `qty`, `total`, `order_date`, `status`, `customar_name`, `customar_contact`, `customar_email`, `customar_adresse`, `image_name`) VALUES 
                    ('$title','$price','$quantity','$total','$date_now','not yet','$c_name','$c_phone','$c_email','$c_adresse','$img')");
                    
                        $query_update=mysqli_query($con,"UPDATE `tbl_client` SET `mobile`='$c_phone',`adresse`='$c_adresse' WHERE username='$username'");
                    
                }
            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

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
<?php } ?>