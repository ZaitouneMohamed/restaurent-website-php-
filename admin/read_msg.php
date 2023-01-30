<?php
include ('partial/menu.php'); include('connection.php'); 

$id=$_GET["id"];
?>


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
<?php
    $query=mysqli_query($con,"select m.* , u.username from messages m join tbl_client u on m.user_id=u.id where m.id = $id");
    $x=mysqli_fetch_array($query);
?>

<div class="container">
    <h1><?php echo $x[5]; ?></h1>
    <div style="display:flex"><h2><?php echo $x[2]; ?></h2> <i><?php echo $x[3]; ?></i></div>
</div>

</body>
</html>

<?php include ('partial/footer.php'); ?>
<?php
    $updqte_query=mysqli_query($con,"UPDATE `messages` SET `statue`='1' WHERE `id`='$id'");
?>