<?php  include'partial/menu.php';  ?>
<?php  
    include ('connection.php');
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
        <h1 class="text text-center text-primary">add new categorie</h1>
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
                    <td>image :</td>
                    <td>
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
                        <input type="submit" value="submit" name="add" class="btn btn-success">                    
                        <!-- <button type="button" class="btn btn-secondary" name="update">update</button> -->
                    </td>  
                    
                </tr>
                
            </table>
            
        </form>
        <?php
                
                if (isset($_POST["add"])){
                    $title=strip_tags($_POST["title"]);
                    if (isset($_POST["featured"])){
                        $featured=$_POST["featured"];
                    }
                    if (isset($_POST["active"])){
                        $active=$_POST["active"];
                    }
                    $filename=$_FILES["img"]["name"];
                    $tmpname=$_FILES["img"]["tmp_name"];
                    $lblassa="images/categorie/";
                    move_uploaded_file($tmpname,$lblassa.$filename);
                    
                    $req=mysqli_query($con,"insert into categorie_table (title,image_name,featured,active) values('$title','$filename','$featured','$active')");
                    header("location:manage_categorie.php");
                }
        ?>
        


    </div>
</div>
<?php include'partial/footer.php'; ?>

</body>
</html>