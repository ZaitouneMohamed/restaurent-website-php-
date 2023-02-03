<?php include 'partial/menu.php';  ?>
<?php
include('connection.php');
$fill_select = mysqli_query($con, "SELECT id,title FROM `categorie_table` ");
?>
<?php

if (isset($_POST["add"])) {
    $title = strip_tags($_POST["title"]);
    $description = strip_tags($_POST["description"]);
    $price = strip_tags($_POST["price"]);
    // image
    $filename = $_FILES["img"]["name"];
    $tmpname = $_FILES["img"]["tmp_name"];
    $lblassa = "images/foods/";
    move_uploaded_file($tmpname, $lblassa . $filename);
    // radio buttons
    $categorie = $_POST["categorie"];
    if (isset($_POST["featured"])) {
        $featured = $_POST["featured"];
    }
    if (isset($_POST["active"])) {
        $active = $_POST["active"];
    }


    $req = mysqli_query($con, "insert into food (title,description,price,image_name,categorie_id,freatured,active) values('$title','$description','$price','$filename','$categorie','$featured','$active')");
    echo ' <script> location.replace("manage_food.php"); </script>';
}
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

    <div class="container">
        <div class="wrapper">
            <h1 class="text text-center">add food</h1>
            <br><br>
            <form method="POST" enctype="multipart/form-data">
                
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">titre</label>
                        <input type="text" name="title" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">description</label>
                        <textarea name="description" id="" cols="18" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Price</label>
                        <input type="number" name="price" id="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">image</label>
                        <input type="file" name="img" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">categorie</label>
                        <select name="categorie" id="" class="form-control">
                                <?php
                                while ($row = mysqli_fetch_array($fill_select)) {
                                    echo ("<option value='$row[0]'>$row[1]</option>");
                                }
                                ?>
                            </select>
                    </div>
                    <div class="mb-3"> 
                        <label class="form-check-label" for="flexRadioDefault1">featured</label>
                        <input type="radio" name="featured" id="" value="yes" checked>Yes
                        <input type="radio" name="featured" id="" value="no">No
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Active</label>
                        <input type="radio" name="active" id="" value="yes" checked>Yes
                        <input type="radio" name="active" id="" value="no">No
                    </div>
                    
                    <div class="mb-3">
                         <input type="submit" value="submit" name="add" class="btn btn-success">
                    </div>

            </form>




        </div>
    </div>
    <?php include 'partial/footer.php'; ?>

</body>

</html>