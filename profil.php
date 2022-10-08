<?php include('admin/connection.php');
session_start(); 
if(!isset($_SESSION["username"])){
    header("location:login.php");
}
else{
    $username=$_SESSION['username'];
    $query_select_info=mysqli_query($con,"SELECT * FROM `tbl_client` WHERE username='$username'");
    $row=mysqli_fetch_array($query_select_info);
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
    
    <!--  Profile information start here -->
        <div class="container">
            <center>
                username : <b><i><?php echo $row[2];?></i></b><br><br>
                email : <b><i><?php echo $row[1];?></i></b><br><br>
                mobile : <b><i><?php echo $row[3];?></i></b><br><br>
                adresse : <b><i><?php echo $row[7];?></i></b><br><br>
                <a href="update_profile.php" class='btn btn-primary'>update profile information</a>
                <a href="change_password.php" class='btn btn-danger'>change password</a>
            </center>
        </div>
    <!--  Profile information end here -->


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