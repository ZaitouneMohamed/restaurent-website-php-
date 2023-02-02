<?php
include 'partial/menu.php';
include('connection.php');

if (isset($_POST["submit"])) {
    $email = strip_tags($_POST["email"]);
    $username = strip_tags($_POST["username"]);
    $password = md5($_POST["password"]);
    $req = mysqli_query($con, "insert into tbl_client (`email`, `username`,`password`) values ('$email' , '$username' , '$password') " );
    if ($req) {
        echo ' <script> location.replace("manage_users.php"); </script>';
    }else {
        echo "<script> alert('ghreut'); </script>";
        
    }
}
?>


<div class="container">
    <h1>Add User</h1>
    <form method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="test" class="form-control" id="exampleInputEmail1" name="username">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php include 'partial/footer.php'; ?>

</body>

</html>