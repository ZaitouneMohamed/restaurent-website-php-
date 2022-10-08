<?php
    $con=mysqli_connect("localhost","root","","order_food_project");
    if ($con){
        echo ('<script>alert("all good")');
    }
?>