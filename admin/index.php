<?php
session_start();
ob_start();
include('connection.php');
if (!isset($_SESSION['admin_username'])) {
    // header("Location:index.php");
    echo "<script>alert('you are not loged in')</scropt>";
}
    include('../admin/includes/navbar.php');
    echo 'yyyyyyyyyyyyyyyyyyyyyyyyyyyyytestttttt'.$_SESSION['admin_username'];
    include_once('../admin/includes/footer.php');
