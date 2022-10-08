<?php 
include('admin/connection.php');
session_start();
error_reporting(0);
if (isset($_POST['submit'])) {
        $username=$_SESSION['username_fp'];
		$question = $_POST['question'];
		$answer = md5($_POST['answer']);
        //$sql=mysqli_query($con,"UPDATE `tbl_client` SET `question`='$question',`answer`='$answer' WHERE username='$username'");
        $sql=mysqli_query($con,"select * from `tbl_client` WHERE username='$username'");
        $row=mysqli_fetch_assoc($sql);
        $qs_db=$row["question"];
        $an_db=$row["answer"];
        if ($qs_db==$question && $an_db==$answer) {
            header("Location:FP_UP.php");
        }
        else{
            echo "<script>alert('ata rj3 t9awd')</script>";
        }
        //header("location:index.php");
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
<body>
	<div class="container">
		<form method="POST" class="login-email">
            <p class="login-text" style="font-size: 1rem; font-weight: 740;">hello mr :  <i><?php echo $_SESSION['username_fp'];?></i> </p>
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">shose answer</p>
			<div class="input-group">
                <select name="question" style="width: 100%;border: 2px solid #e7e7e7;padding: 15px 20px;font-size: 1rem;border-radius: 30px;background: transparent;outline: none;transition: .3s;" id="">
                    <option value="fin tzaditi">fin tzaditi</option>
                    <option value="smit mamak">smit mamak</option>
                                <option value="gj..">gj..</option>
                            </select><br><br>
			</div>
			<div class="input-group">
				<input type="text" placeholder="answer" name="answer" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">contunie</button>
			</div>
		</form>
	</div>
</body>
</html>