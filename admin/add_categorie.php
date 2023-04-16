<?php
include('functions.php');
?>
<?= navbar(); ?>
<?php

if (isset($_POST["submit"])) {
    $title = strip_tags($_POST["title"]);
    $featured = strip_tags($_POST["featured"]);
    $active = $_POST["active"];
    $image = $_FILES["image"]["name"];
    $tmpname = $_FILES["image"]["tmp_name"];
    $place = "images/categorie/";
    move_uploaded_file($tmpname, $place . $image);
    $pdo = pdo_connect_mysql();
    $query = $pdo->prepare('INSERT INTO categorie_table (title,image_name,featured,active) values(?,?,?,?)');
    $query->execute([$title,$image,$featured,$active]);
    echo ("<script>alert('all good')</script>");
    // header("location:manage_categorie.php");
}

?>

<div class="container">
    <div class="wrapper">
        <h1 class="text text-center">add new categorie</h1>
        <br><br>

        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">titre</label>
                <input type="text" name="title" class="form-control" id="" placeholder="enter title">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">image</label>
                <input type="file" name="image" class="form-control" id="">
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
                <input type="submit" value="submit" name="submit" class="btn btn-success">
            </div>
        </form>
    </div>
</div>
<?= footer(); ?>