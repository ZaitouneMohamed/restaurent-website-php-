<?php include ('partial/menu.php'); ?>
<?php
    include ('connection.php');
    
    
        if (isset($_POST["submit"])){
            $full_name=strip_tags($_POST["full_name"]);
            $username=strip_tags($_POST["username"]);
            $password=md5($_POST["password"]);
            $req = mysqli_query($con,"insert into admin_table (full_name,username,password) values('$full_name','$username','$password')");
            header("location: manage_admin.php");  
        }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="main_content">
    <div class="wrapper">
        <h1>add admin</h1>
        <form action="" method="post">
            <table>
                <tr>
                    <td>full name :</td>
                    <td>
                        <input type="text" name="full_name" id="full_name" placeholder="enter your name">
                    </td>
                </tr>
                <tr>
                    <td>username :</td>
                    <td>
                        <input type="text" name="username" id="username" placeholder="enter your username">
                    </td>
                </tr>
                <tr>
                    <td>password :</td>
                    <td>
                        <input type="password" name="password" id="username" placeholder="enter your password">
                    </td>
                </tr>
                <tr>
                    
                    <td>
                            <input type="submit" value="submit" name="submit">
                    </td>
                </tr>
                
            </table>
        </form>
    </div>
    </div>
    <?php include ('partial/footer.php'); ?>
</body>
</html>
