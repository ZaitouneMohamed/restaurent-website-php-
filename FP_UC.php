<?php 
include('admin/connection.php');
session_start();
error_reporting(0);

if (isset($_POST['submit'])) {
		$email = $_POST['email'];
		$sql = "SELECT * FROM tbl_client WHERE email='$email'";
		$result = mysqli_query($con, $sql);
		if ($result->num_rows > 0) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['username_fp'] = $row['username'];
			$_SESSION['email']=$row['email'];
			header("Location:FP_QC.php");
		} else {
			echo "<script>alert('Woops! Email is Wrong.')</script>";
		}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/login_css.css">
	<title>forget password</title>
</head>
<body>
	<div class="container">
		<form method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Enter Email</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<center><p class="login-register-text"><a href="login.php">back to login</a>.</p></center>
		</form>
	</div>
</body>
</html>