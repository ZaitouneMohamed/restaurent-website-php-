<?php 
    include ('partial/menu.php');
    include ('connection.php');
?>
<?php

    $r=mysqli_query($con,"select * from tbl_client");
?>
<div class="container">
    <a href="add_user.php" class="btn btn-primary">Add User</a>
    <br><br>

    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">Email</th>
                <th scope="col">Username</th>
                <th scope="col">phone number</th>
                <th scope="col">adresse</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                        while ($row =  mysqli_fetch_array($r)) {
                            $id=$row[0];
                            echo ('<tr>');
                            echo ("
                            <td> $row[1] </td>
                            <td> $row[2] </td>
                            <td> $row[5] </td>
                            <td> $row[7]</td>
                            <td> 
                                <a href='' class='btn btn-danger'>delete user</a>
                                <a href='login_as_user.php?id=$id' class='btn btn-success'>login</a>
                            </td>
                            </tr>");
                            
                        }
                    ?>

            </tr>
        </tbody>
    </table>



</div>
<?php 
    include ('partial/footer.php');
?>

</body>

</html>