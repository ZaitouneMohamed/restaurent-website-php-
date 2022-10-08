<?php  include'partial/menu.php';  ?>
<?php  
    include ('connection.php');
    $fill_select=mysqli_query($con,"SELECT id,title FROM `categorie_table` ");
?>
<?php
                
                if (isset($_POST["add"])){
                    $title=strip_tags($_POST["title"]);
                    $description=strip_tags($_POST["description"]);
                    $price=strip_tags($_POST["price"]);
                    // image
                    $filename=$_FILES["img"]["name"];
                    $tmpname=$_FILES["img"]["tmp_name"];
                    $lblassa="images/";
                    move_uploaded_file($tmpname,$lblassa.$filename);
                    // radio buttons
                    $categorie=$_POST["categorie"];
                    if (isset($_POST["featured"])){
                        $featured=$_POST["featured"];
                    }
                    if (isset($_POST["active"])){
                        $active=$_POST["active"];
                    }
                    
                    
                    $req=mysqli_query($con,"insert into food (title,description,price,image_name,categorie_id,freatured,active) values('$title','$description','$price','$filename','$categorie','$featured','$active')");
                    header("location: manage_food.php");
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

<div class="main_content">
    <div class="wrapper">
        <h1>add food</h1>
        <br><br>
        <form method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Title :</td>
                    <td>
                        <input type="text" name="title" id="" placeholder="enter title">
                    </td>
                </tr>
                <tr>
                    <td>description :</td>
                    <td>
                        <textarea name="description" id="" cols="18" rows="3"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price :</td>
                    <td>
                        <input type="number" name="price" id="" placeholder="enter price">
                    </td>
                </tr>
                <tr>
                    <td>image :</td>
                    <td>
                        <input type="file" name="img" id="">
                    </td>
                </tr>
                <tr>
                    <td>categorie :</td>
                    <td>
                        <select name="categorie" id="">
                            <?php
                                while ($row=mysqli_fetch_array($fill_select)){
                                    echo("<option value='$row[0]'>$row[1]</option>");
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
                        <!-- <button type="button" class="btn btn-secondary" name="update">update</button> -->
                    </td>  
                    
                </tr>
                
            </table>
            
        </form>
        
        


    </div>
</div>
<?php include'partial/footer.php'; ?>

</body>
</html>