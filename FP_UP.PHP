<?php 
include('admin/connection.php');
session_start();
error_reporting(0);


if (isset($_POST['submit'])) {
		$username =$_SESSION['username_fp'];
		$password = md5($_POST['pass1']);
		$sql =mysqli_query($con,"UPDATE `tbl_client` SET `password`='$password' where `username`='$username'");
		$_SESSION['username'] = $username;
		header("Location:index.php");
		}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/login_css.css">
	<title>Login Form</title>
</head>
<body >
	<div class="container" style="background-color: white;">
		<form method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Update Password</p>
			<div class="input-group">
				<input type="password" placeholder="password" name="pass1" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="repeat password" name="pass2" required>
			</div>
			<center><h4></h4></center>
			<div class="input-group">
				<button name="submit" class="btn" disabled>Login</button>
			</div>
		</form>
	</div>
	<script>
    myform=document.forms[0]
    myform.pass2.oninput=function f1(){
        p=document.querySelector('h4');
        if(myform.pass1.value!=myform.pass2.value){
            p.innerText="not match";
            myform.submit.setAttribute("disabled","")
        }else{
            p.innerText="all good"
            myform.submit.removeAttribute("disabled") 
        }
    }
</script>
</body>
</html>