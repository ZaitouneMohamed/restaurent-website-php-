<?php 
    include ('partial/menu.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    
    
    <div class="main_content">
        <div class="aa">
        <h1><strong><i><?php echo $_SESSION['admin_fullname'];?></i></strong></h1>
        </div>
        </div>
    </div>
    <?php include ('partial/footer.php');?>

</body>
</html>