<?php include('admin/connection.php');
session_start(); 
if(!isset($_SESSION["username"])){
    header("location:login.php");
}
else{
    include ("includes/navbar.php");
    $username=$_SESSION["username"];
    if(isset($_POST["submit"])){
        $old_pass=md5($_POST["old_pass"]);
        $query_check_pass=mysqli_query($con,"SELECT * FROM `tbl_client` WHERE username='$username'");
        $row = mysqli_fetch_assoc($query_check_pass);
        $x=$row['password'];
        if ($x!=$old_pass) {
            echo 
            ("
                        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>wrong pass</strong>lcode ghalat.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
                </div>
            ");
        }
        else{
            $p1=md5($_POST["pass1"]);
            $p2=md5($_POST["pass2"]);
            $query_update_account=mysqli_query($con,"UPDATE `tbl_client` SET `password`='$p1' where `username`='$username'");
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
        }
        
    }
?>
<div class="container">
    <center><h1><i>change password</i></h1></center>
    <center>
    <fieldset>
        <form method="post">
            <legend><?php echo $_SESSION["username"]?></legend>
            old password : <input type="password" name="old_pass" id="" ><br><br>
            new password : <input type="password" name="pass1" id="" ><br><br>
            repeat password : <input type="password" name="pass2" id=""><br><br>
            <p></p>
            <button type="button" class="btn btn-primary" disabled data-toggle="modal" data-target="#exampleModalCenter" name="submit1">valider</button>
            <div class="modal-dialog modal-dialog-centered" role="document">
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
</form>
    </fieldset>
    </center>
</div>
<?php }?>
<script>
    myform=document.forms[0]
    myform.pass2.oninput=function f1(){
        p=document.querySelector('p');
        if(myform.pass1.value!=myform.pass2.value){
            p.innerText="not match";
            myform.submit1.setAttribute("disabled","")
        }else{
            p.innerText="all good"
            myform.submit1.removeAttribute("disabled") 
        }
    }
</script>