<?php 
    include ('partial/menu.php');
    include ('connection.php');
?>
<?php

    $r=mysqli_query($con,"select * from food");
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
        <a href="add_food.php" class="btn-primary">Add Food</a>
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
                        // echo mysqli_fetch_array($r)[1].'<br>';
                        while ($row =  mysqli_fetch_array($r)) {
                            $id=$row[0];
                            echo ('<tr>');
                            echo ("<td> $row[0] </td>
                            <td> $row[1] </td>
                            <td> $row[2] </td>
                            <td> $row[3] </td>
                            <td> <img src='images/$row[4]' alt='' width='50px' height='50px'> </td>
                            <td> $row[5] </td>
                            <td> $row[6] </td>
                            <td> $row[7] </td>
                            
                            <td> 
                                <a href='update_food.php?id=$id' class='btn-secondary'>update categorie</a>
                                <a href='delete_food.php?id=$id' class='btn-primary'>delete categorie</a>
                            </td>
                            </tr>");
                            
                        }
                    ?>
                        
                </tr>
            </tbody>
        </table>
        


        </div>
    </div>

    <?php include ('partial/footer.php');?>

</body>
</html>