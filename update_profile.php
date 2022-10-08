<?php include('admin/connection.php');
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
<?php 
        ?>
    <!-- Navbar Section Starts Here -->
    <?php include ("includes/navbar.php");
    
    $username=$_SESSION["username"];
    $query_get_values=mysqli_query($con,"SELECT `email`, `mobile`,`adresse` FROM `tbl_client` WHERE username='$username'");
    $row=mysqli_fetch_array($query_get_values);
    if(isset($_POST["submit"])){
        $email=$_POST["email"];
        $mobile=$_POST["mobile"];
        $adresse=$_POST["adresse"];
        $query_update_account=mysqli_query($con,"UPDATE `tbl_client` SET `email`='$email',`mobile`='$mobile',`adresse`='$adresse' where `username`='$username'");
        if($query_update_account){
            echo 
            ("
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>iwa mbrouk!</strong> you account have been updated successfly.
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
            ");
            $query_get_values=mysqli_query($con,"SELECT `email`, `mobile`,`adresse` FROM `tbl_client` WHERE username='$username'");
            $row=mysqli_fetch_array($query_get_values);
        }
        else{
            echo 
            ("
                        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
                </div>
            ");
        }
        }?>   
    
    <!-- acount Section Starts Here -->
    <div class="container profile">
    <center><form method="post">
            <fieldset>
                <legend>profile</legend>
                username : <i><b><?php echo $username?></b></i> <br><br>
                email :<input type="text" name="email" id="" value="<?php echo $row[0]?>"><br><br>
                mobile :<input type="tel" name="mobile" id="" value="<?php echo $row[1]?>"><br><br>
                adresse :<textarea name="adresse" id="" cols="10" rows="10"style="width: 305px; height: 76px;"><?php echo $row[2]?></textarea><br><br>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">valider</button>
            </fieldset>
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
      </div>
    </div>
  </div>
</div>
        </form></center>
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
<?php } ?>
