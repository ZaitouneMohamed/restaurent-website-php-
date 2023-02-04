<?php
    include ('partial/menu.php');
    include('connection.php');
    $query_1=mysqli_query($con,"select m.* , u.username from messages m join tbl_client u on m.user_id=u.id where statue=0");

    $query_2=mysqli_query($con,"select m.* , u.username from messages m join tbl_client u on m.user_id=u.id where statue=1");
?>

<div class="container">
    <div class="unreaded">
        <h1>Unreaded messages(<?php echo $query_1->num_rows ?>)</h1>
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">full name</th>
                    <th scope="col">content</th>
                    <th scope="col">date</th>
                    <th scope="col">action</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                        while ($row =  mysqli_fetch_array($query_1)) {
                            $id=$row[0];
                            echo ('<tr>');
                            echo ("<td> $row[5] </td>");
                            echo ("<td>");
                            echo substr($row[2], 0, 5).'...';
                            echo ("</td>");
                            echo ("<td> $row[5] </td>");
                            echo ("<td><a href='delete.php?id=$id&&table=message' class='btn btn-danger'>delete</a><a href='read_msg.php?id=$id' class='btn btn-success'>read it</a></td>");
                            echo ('</tr>');
                            
                        }
                    ?>

                </tr>
            </tbody>
        </table>
    </div>
    <div class="readed">
        <h1>Readed messages(<?php echo $query_2->num_rows ?>)</h1>
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">full name</th>
                    <th scope="col">content</th>
                    <th scope="col">date</th>
                    <th scope="col">action</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                        while ($row =  mysqli_fetch_array($query_2)) {
                            $id=$row[0];
                            echo ('<tr>');
                            echo ("<td> $row[5] </td>");
                            echo ("<td>");
                            echo substr($row[2], 0, 5).'...';
                            echo ("</td>");
                            echo ("<td> $row[5] </td>");
                            echo ("<td><a href='delete.php?id=$id&&table=message' class='btn btn-danger'>delete</a><a href='read_msg.php?id=$id' class='btn btn-success'>read it</a></td>");
                            echo ('</tr>');
                            
                        }
                    ?>

                </tr>
            </tbody>
        </table>
    </div>
</div>

</body>

</html>

<?php ;include ('partial/footer.php'); ?>