<?php
include ('partial/menu.php'); include ('connection.php');
    $r=mysqli_query($con,"select * from admin_table");
?>
<div class="container">
    <h1><strong><i><?php echo $_SESSION['admin_fullname'];?></i></strong></h1>
    <br>
    <!-- <a href="add_admin.php" class="class="btn btn-primary">manage admin</a> -->
        <a class="btn btn-primary" href="add_admin.php">manage admin</a>
    <br><br>

    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">full name</th>
                <th scope="col">username</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                        // echo mysqli_fetch_array($r)[1].'<br>';
                        
                        while ($row =  mysqli_fetch_array($r)) {
                            $id=$row[0];
                            echo ('<tr>');
                            echo ("<td> $row[0] </td>");
                            echo ("<td> $row[1] </td>");
                            echo ("<td> $row[2] </td>");
                            echo ("
                            <td> 
                            <a href='update_admin.php?id=$id' class='btn btn-secondary'>update admin</a>
                            <a href='delete_admin.php?id=$id' class='btn btn-primary'>delete admin</a>
                            </td>
                            ");
                            echo ('</tr>');
                            
                        }
                    ?>

            </tr>
        </tbody>
    </table>
</div>
<?php include ('partial/footer.php'); ?>