<?php
    include ('connection.php');
    include ('partial/menu.php');
    $id=$_GET["id"];
    $query1=mysqli_query($con,"SELECT * FROM `admin_table` WHERE id=$id");
    // $x=mysqli_num_rows($query1);
    // if($x==1){
        $rows=mysqli_fetch_assoc($query1);
        $full_name=$rows["full_name"];
        $username=$rows["username"];
        $pass=$rows["password"];
    // }
    if (isset($_POST["submit"])){
        $full_name=$_POST["full_name"];
        $username=$_POST["username"];
        $pass=md5($_POST["password"]);
        $query2=mysqli_query($con,"UPDATE `admin_table` SET  `full_name` = '$full_name', `username` = '$username' , `password` = '$pass' WHERE `admin_table`.`id` = $id ");
        header("location: manage_admin.php");
    }
?>

<div class="main_content">
    <div class="wrapper">
        <h1>update admin</h1>
        <form method="post">
            <table>
                <tr>
                    <td>full name :</td>
                    <td>
                        <input type="text" name="full_name" id="full_name" placeholder="enter your name" value="<?php echo $full_name; ?>">
                    </td>
                </tr>
                <tr>
                    <td>username :</td>
                    <td>
                        <input type="text" name="username" id="username" placeholder="enter your username" value="<?php echo $username; ?>">
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
                            <input type="submit" value="update" name="submit">
                    </td>
                </tr>
                
            </table>
        </form>
    </div>
    </div>

<?php
    include ('partial/footer.php');
?>