<?php
include('admin/connection.php');
session_start();
error_reporting(0);
if (isset($_POST['submit'])) {
	$username = $_SESSION['username_fp'];
	$question = $_POST['question'];
	$answer = md5($_POST['answer']);
	$sql = mysqli_query($con, "select * from `tbl_client` WHERE username='$username'");
	$row = mysqli_fetch_assoc($sql);
	$qs_db = $row["question"];
	$an_db = $row["answer"];
	if ($qs_db == $question && $an_db == $answer) {
		header("Location:FP_UP.php");
	} else {
		echo "<script>alert('ata rj3 t9awd')</script>";
	}
}

?>

<!-- <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/login_css.css">    

	<title>Login Form</title>
</head>
<body>
	<div class="container">
		<form method="POST" class="login-email">
           
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">shose answer</p>
			<div class="input-group">
                <select name="question" style="width: 100%;border: 2px solid #e7e7e7;padding: 15px 20px;font-size: 1rem;border-radius: 30px;background: transparent;outline: none;transition: .3s;" id="">
                    <option value="fin tzaditi">fin tzaditi</option>
                    <option value="smit mamak">smit mamak</option>
                                <option value="gj..">gj..</option>
                            </select><br><br>
			</div>
			<div class="input-group">
				<input type="text"  >
			</div>
			<div class="input-group">
				<button name="submit" class="btn">contunie</button>
			</div>
		</form>
	</div>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>SB Admin 2 - Forgot Password</title>

	<!-- Custom fonts for this template-->
	<link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-xl-10 col-lg-12 col-md-9">

				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<div class="row">
							<div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
							<div class="col-lg-6">
								<div class="p-5">
									<div class="text-center">
									<p class="login-text" style="font-size: 1rem; font-weight: 740;">hello mr :  <i><?php echo $_SESSION['username_fp']; ?></i> </p>
										<h1 class="h4 text-gray-900 mb-2">shose your security question</h1>
									</div>
									<form class="user" method="post">
										<div class="form-group">
											<select style="width: 342px; height: 67px;" class="form-select form-control-user" name="question" aria-label="Default select example">
												<option selected>Open this select menu</option>
												<option value="fin tzaditi">fin tzaditi</option>
												<option value="smit mamak">smit mamak</option>
												<option value="gj..">gj..</option>
											</select>
										</div>
										<div class="form-group">
											<input type="text" name="answer" required class="form-control " placeholder="answer">
										</div>
										<button name="submit" class="btn btn-primary btn-user btn-block">
											Reset Password
										</button>
									</form>
									<hr>
									<div class="text-center">
										<a class="small" href="register.html">Create an Account!</a>
									</div>
									<div class="text-center">
										<a class="small" href="login.html">Already have an account? Login!</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="admin/vendor/jquery/jquery.min.js"></script>
	<script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="admin/js/sb-admin-2.min.js"></script>

</body>

</html>