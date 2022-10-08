<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php include ('partial/menu.php'); include('connection.php'); ?>
<?php
    $query_1=mysqli_query($con,"select * from tbl_msg where status=0");
    $count_unreaded=mysqli_query($con,"select count(*) from tbl_msg where status=0");
    $unreaded=mysqli_fetch_row($count_unreaded);

    $query_2=mysqli_query($con,"select * from tbl_msg where status=1");
    $count_readed=mysqli_query($con,"select count(*) from tbl_msg where status=1");
    $readed=mysqli_fetch_row($count_readed);
?>

<div class="main_content">
    <div class="unreaded">
        <h1>Unreaded messages(<?php echo $unreaded[0]?>)</h1>
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">full name</th>
                    <th scope="col">email</th>
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
                            echo ("<td> $row[1] </td>");
                            echo ("<td> $row[2] </td>");
                            echo ("<td> $row[5] </td>");
                            echo ("<td><a href='delete_msg.php?id=$id' class='btn-secondary'>delete</a></td>");
                            echo ("<td><a href='read_msg.php?id=$id' class='btn-secondary'>read it</a></td>");
                            echo ('</tr>');
                            
                        }
                    ?>
                        
                </tr>
            </tbody>
        </table>
    </div>
    <div class="readed">
    <h1>Readed messages(<?php echo $readed[0]?>)</h1>
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">full name</th>
                    <th scope="col">email</th>
                    <th scope="col">date</th>
                    <th scope="col">action</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php
                        while ($row2 =  mysqli_fetch_array($query_2)) {
                            $id=$row2[0];
                            echo ('<tr>');
                            echo ("<td> $row2[1] </td>");
                            echo ("<td> $row2[2] </td>");
                            echo ("<td> $row2[5] </td>");
                            echo ("<td><a href='delete_msg.php?id=$id' class='btn-secondary'>delete</a></td>");
                            echo ("
                            <td> 
                                <a href='read_msg.php?id=$id' class='btn-secondary'>read more</a>
                            </td>
                            ");
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
