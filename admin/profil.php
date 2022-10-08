<?php include ('partial/menu.php'); include ('connection.php');?>

<div class="main_content">
        <div class="aa">
<?php
    
    $username=$_SESSION['admin_username'];
    $query_select_info=mysqli_query($con,"SELECT * FROM `admin_table` WHERE username='$username'");
    $row=mysqli_fetch_array($query_select_info);
    $id=$row[0];
?>
        <center>
                username : <b><i><?php echo $row[2];?></i></b><br><br>
                email : <b><i><?php echo $row[1];?></i></b><br><br>
                <a href="update_admin.php?id=<?php echo $id;?>" class='btn btn-primary'>update profile information</a>
                <a href="change_password.php" class='btn btn-danger'>change password</a>
            </center>
        </div>
        </div>
    </div>
<?php include ('partial/footer.php'); ?>
