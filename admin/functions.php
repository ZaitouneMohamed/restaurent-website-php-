<?php
session_start();
function pdo_connect_mysql()
{
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'order_food_project';
    try {
        return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
        exit('Failed to connect to database!');
    }
}

$pdo = pdo_connect_mysql();

function addadmin($full_name,$username,$password) {
    $pdo = pdo_connect_mysql();
    $query = $pdo->prepare('INSERT into admin_table (full_name,username,password) values(?,?,?)');
    $query->execute([$full_name]);
    $query->execute([$username]);
    $query->execute([md5($password)]);
    header("location:manage_admin.php");  
}

if (!isset($_SESSION['admin_username'])) {
    header('location:login.php');
}

function navbar() {
    include('../admin/includes/navbar.php');
}

function footer() {
    include('../admin/includes/footer.php');
}
