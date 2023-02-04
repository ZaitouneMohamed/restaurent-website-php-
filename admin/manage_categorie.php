<?php
include ('partial/menu.php'); include('connection.php'); 
    $r=mysqli_query($con,"select * from categorie_table");
?>
    <div class="container">
            <a href="add_categorie.php" class="btn btn-primary">add categorie</a>
            <br><br>

            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">title</th>
                        <th scope="col">image name</th>
                        <th scope="col">featured</th>
                        <th scope="col">active</th>
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
                            echo ("<td> <img src='images/categorie/$row[2]' alt='' width='50px' height='50px'> </td>");
                            echo ("<td> $row[3] </td>");
                            echo ("<td> $row[4] </td>");
                            echo ("
                            <td> 
                                <a href='update_categorie.php?id=$id' class='btn btn-warning'>update categorie</a>
                                <a href='delete.php?id=$id&&table=categorie' class='btn btn-danger'>delete categorie</a>
                            </td>
                            ");
                            echo ('</tr>');
                            
                        }
                    ?>

                    </tr>
                </tbody>
            </table>
        </div>

    <?php ;include ('partial/footer.php'); ?>

</body>

</html>