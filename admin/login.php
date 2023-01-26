<?php
    session_start();
    // ob_start();
    include ('connection.php');
    if (isset($_SESSION['admin_username'])) {
        header("Location: index.php");
    }
    
    if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password =md5($_POST['password']);
            $sql = "SELECT * FROM admin_table WHERE username='$username' AND password='$password'";
            $result = mysqli_query($con, $sql);
            if ($result->num_rows > 0) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['admin_username'] = $row['username'];
                $_SESSION['username'] = $row['username'];
                $_SESSION["admin_fullname"]= $row['full_name']; 
                header("Location:index.php");
            } else {
                echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
            }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/f9a469bd95.js" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="log_in.css">
</head>

<body>
    <div class="singupform">
        <form class="form" method="post">
            <h1>Log In</h1>
            <div class="inputcontainer">
                <input type="text" placeholder="a" class="input" id="email_input" name="username">
                <label for="" class="label">Email Or Username</label>
            </div>
            <div class="inputcontainer">
                <input type="password" placeholder="a" class="input" id="password_input" name="password">
                <label for="" class="label">Password</label>
                <br><br><br>
            </div> 
                <input type="submit" class="submitbtn" value="Log In" name="submit">
        </form>
        <button id="mybtn">sh</button>
    </div>
    <script src="log_in.js"></script>
</body>
</html>