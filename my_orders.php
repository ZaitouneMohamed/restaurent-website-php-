<?php 
include('admin/connection.php');
session_start(); 
if(!isset($_SESSION["username"])){
    header("location:login.php");
}
else{
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

    <section class="my_orders">
        <div class="container">
            <h1><?php echo $_SESSION["username"]?> orders</h1>



<?php
    $username=$_SESSION["username"];
    $query_select_orders=mysqli_query($con,"SELECT * FROM `order` WHERE `customar_name`='$username'");
    //$row=mysqli_fetch_array($query_select_orders);
?>
<?php
    while($row = mysqli_fetch_array($query_select_orders)){
        $id=$row[0];
        echo 
        ("
        <div class='card mb-3' style='max-width: 540px;position:relative;left:30%'>
        <div class='row g-0'>
            <div class='col-md-4'>
                <img src='admin/images/$row[11]' class='img-fluid rounded-start' alt=''>
                <p class='card-text'>status : <i><b>$row[6]</b></i></p>
            </div>
            <div class='col-md-8'>
            <div class='card-body'>
                <h5 class='card-title'>$row[1]</h5>
                <p class='card-text'>qty : <b><i>$row[3] unit</i></b></p>
                <p class='card-text'>Total to pay : <b><i>$row[4]$</i></b></p>
                <p class='card-text'>orderd on : <i><b>$row[5]</b></i></p>
                <a href='delete_order.php?id=$id' class='btn btn-danger'>delete order</a>
            </div>
            </div>
        </div>
        </div>
        ");
    }
?>

        <!-- <div class="card mb-3" style="max-width: 540px;position:relative;left:30%">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="..." class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
    </div>
  </div> -->

</div>
    </section>

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