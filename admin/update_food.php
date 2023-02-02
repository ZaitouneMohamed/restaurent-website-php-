<?php
include('connection.php');
include('partial/menu.php');
$id = $_GET["id"];
$query1 = mysqli_query($con, "SELECT * FROM `food` WHERE id=$id");
$x = mysqli_num_rows($query1);
if ($x == 1) {
    $rows = mysqli_fetch_assoc($query1);
    $title = $rows["title"];
    $description = $rows["description"];
    $price = $rows["price"];
    $image = $rows["image_name"];
}
$fill_select = mysqli_query($con, "SELECT id,title FROM `categorie_table`");


if (isset($_POST["add"])) {
    $image = $_FILES["img"]["name"];
    $tmpname = $_FILES["img"]["tmp_name"];
    move_uploaded_file($tmpname, "images/foods/" . $image);

    $title = strip_tags($_POST["title"]);
    $description = strip_tags($_POST["description"]);
    $price = strip_tags($_POST["price"]);
    $categorie = strip_tags($_POST["categorie"]);
    if (isset($_POST["featured"])) {
        $featured = $_POST["featured"];
    }
    if (isset($_POST["active"])) {
        $active = $_POST["active"];
    }
    $query2 = mysqli_query($con, "UPDATE `food` SET `title` = '$title', `description` = '$description', `price` = '$price', `image_name` = '$image', `categorie_id` = '$categorie', `freatured` = '$featured', `active` = '$active' WHERE `food`.`id` = $id; ");
    echo ' <script> location.replace("manage_food.php"); </script>';
}
?>

<div class="main_content">
    <div class="wrapper">
        <h1>update food</h1>
        <form method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Title :</td>
                    <td>
                        <input type="text" name="title" id="" placeholder="enter title" value="<?php echo $title ?>">
                    </td>
                </tr>
                <tr>
                    <td>description :</td>
                    <td>
                        <textarea name="description" id="" cols="18" rows="3"><?php echo $description ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price :</td>
                    <td>
                        <input type="number" name="price" id="" placeholder="enter price" value="<?php echo $price ?>">
                    </td>
                </tr>
                <tr>
                    <td>image :</td>
                    <td>
                        <img src="images/<?php echo $image ?>" alt="" width="50px" height="50px">
                        <input type="file" name="img" id="">
                    </td>
                </tr>
                <tr>
                    <td>categorie :</td>
                    <td>
                        <select name="categorie" id="">
                            <?php
                            while ($row = mysqli_fetch_array($fill_select)) {
                                echo ("<option value='$row[0]'>$row[1]</option>");
                            }
                            ?>
                            <!-- <option value=""></option>
                            <option value=""></option>
                            <option value=""></option> -->
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>featured :</td>
                    <td>
                        <input type="radio" name="featured" id="" value="yes" checked>Yes
                        <input type="radio" name="featured" id="" value="no">No
                    </td>
                </tr>
                <tr>
                    <td>Active :</td>
                    <td>
                        <input type="radio" name="active" id="" value="yes" checked>Yes
                        <input type="radio" name="active" id="" value="no">No
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="submit" value="submit" name="add" class="btn btn-success">
                    </td>

                </tr>

            </table>

        </form>
    </div>
</div>

<?php
include('partial/footer.php');
?>