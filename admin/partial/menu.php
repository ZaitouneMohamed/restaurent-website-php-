<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <?php
    if (!isset($_SESSION['admin_username'])){
        ob_start();
        header("location: login.php"); 
        ob_end_clean();
    }
    ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <!-- <div class="menu">
        <div class="wrapper">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="manage_admin.php">admin</a></li>
                <li><a href="manage_categorie.php">Categorie</a></li>
                <li><a href="manage_food.php">food</a></li>
                <li><a href="manage_order.php">order</a></li>
                <li><a href="msg.php">messages</a></li>
                <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="profil.php">profile</a>
            <a class="dropdown-item" href="log_out.php">log out</a>
        </div>
        </li>
            </ul>
        </div>
    </div> -->
    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <div class="d-flex w-50 order-0">
        <a class="navbar-brand mr-1" href="#">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse justify-content-center order-2" id="collapsingNavbar">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">Home</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="manage_admin.php">admin</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="manage_categorie.php">Categorie</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="manage_food.php">Food</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="manage_order.php">Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="msg.php">Messages</a>
            </li>
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $_SESSION['admin_username'];?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="profil.php">Profil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="log_out.php">Log Out</a>
                </div>
            </li>
        </ul>
    </div>
    <!-- <span class="navbar-text small text-truncate mt-1 w-50 text-right order-1 order-md-last">always show</span> -->
</nav>
