<?php 
include('admin/connection.php');
session_start(); 
if(!isset($_SESSION["username"])){
    header("location:login.php");
}
else{
?>
<?php
    date_default_timezone_set("Africa/Casablanca");
    $date=date("Y/m/d h:i:sa");
?>


    <?php
        if (isset($_POST["submit"])){
            $msg=$_POST["text"];
            $id = $_SESSION['user_id'];
            $date = date("Y-m-d h:i:sa");
            $req=mysqli_query($con,"INSERT INTO `messages`(`user_id`, `content`, `statue`) VALUES ('$id','$msg','0')");
            if ($req) {
                echo '<script>alert("thank you a sat")</script>';
            };
        }
    ?>

<?php include('admin/connection.php'); ?>
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

    <div class="container">
        <div class="contact_form">
            
            <marquee><h1>share with us your upinion</h1></marquee>
            <form method="POST">    
                <center>
                    <textarea name="text" id="" cols="30" rows="10"></textarea><br>
                    <input type="submit" value="send message" name="submit" class="btn"/>
                </center>
            </form>
        </div>
    </div>


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