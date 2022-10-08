<?php include ('partial/menu.php'); include ('connection.php');?>

<?php
    $r=mysqli_query($con,"select * from admin_table");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="main_content">
        <div class="aa">
        <h1><strong><i><?php echo $_SESSION['admin_fullname'];?></i></strong></h1>
        <br>
        <!-- <a href="add_admin.php" class="class="btn btn-primary">manage admin</a> -->
        <button class="btn btn-primary"> 
            <a href="add_admin.php">manage admin</a>
        </button>
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
                            <a href='update_admin.php?id=$id' class='btn-secondary'>update admin</a>
                            <a href='delete_admin.php?id=$id' class='btn-primary'>delete admin</a>
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
    <?php include ('partial/footer.php'); ?>

</body>
</html>