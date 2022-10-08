<?php
    include ('connection.php');
    include ('partial/menu.php');
    $id=$_GET["id"];
    $query1=mysqli_query($con,"SELECT * FROM `categorie_table` WHERE id=$id");
    $x=mysqli_num_rows($query1);
    if($x==1){
        $rows=mysqli_fetch_assoc($query1);
        $title=$rows["title"];
        $image=$rows["image_name"];
    }
    
    if (isset($_POST["submit"])){
            $image=$_FILES["img"]["name"];
            $tmpname=$_FILES["img"]["tmp_name"];
            move_uploaded_file($tmpname,"images/".$filename);
            
            $title=strip_tags($_POST["title"]);
            if (isset($_POST["featured"])){
                $featured=$_POST["featured"];
            }
            if (isset($_POST["active"])){
                $active=$_POST["active"];
            }
            $query2=mysqli_query($con,"UPDATE `categorie_table` SET `title` = '$title', `image_name` = '$image', `featured` = '$featured', `active` = '$active' WHERE `categorie_table`.`id` = $id; ");
            header("location: manage_categorie.php");
    }
?>

<div class="main_content">
    <div class="wrapper">
        <h1>update categorie</h1>
        <form method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>title :</td>
                    <td>
                        <input type="text" name="title" id="full_name" placeholder="enter your name" value="<?php echo $title; ?>">
                    </td>
                </tr>
                <tr>
                    <td>image :</td>
                    <td>
                        <img src="images/<?php echo $image;?>" alt="" width="50px" height="50px">
                        <input type="file" name="img" id="">
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
                            <input type="submit" value="update" name="submit">
                    </td>
                </tr>
                
            </table>
        </form>
    </div>
    </div>

<?php
    include ('partial/footer.php');
?>