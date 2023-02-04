<?php 
    include ('partial/menu.php');
    include ('connection.php');
?>
<?php

    $r=mysqli_query($con,"select f.* , c.title from food f join categorie_table c on f.categorie_id = c.id");
?>
<div class="container">
    <a href="add_food.php" class="btn btn-primary">Add Food</a>
    <br><br>

    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">title</th>
                <th scope="col">description</th>
                <th scope="col">price</th>
                <th scope="col">image name</th>
                <th scope="col">categorie id</th>
                <th scope="col">featured</th>
                <th scope="col">active</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                        while ($row =  mysqli_fetch_array($r)) {
                            $id=$row[0];
                            echo ('<tr>');
                            echo ("<td> $row[0] </td>
                            <td> $row[1] </td>
                            <td> $row[2] </td>
                            <td> $row[3]$ </td>
                            <td> <img src='images/foods/$row[4]' alt='' width='50px' height='50px'> </td>
                            <td> $row[8] </td>
                            <td> $row[6] </td>
                            <td> $row[7] </td>
                            
                            <td> 
                                // <a href='update_food.php?id=$id' class='btn btn-warning'>update food</a>
                                <a href='delete_food.php?id=$id' class='btn btn-danger'>delete food</a>
                                <a href='delete.php?id=$id&&table=food' class='btn btn-danger'>delete test</a>
                            </td>
                            </tr>");
                            
                        }
                    ?>

            </tr>
        </tbody>
    </table>



</div>
<?php include ('partial/footer.php');?>

</body>

</html>