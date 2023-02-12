<?php
    // $con=mysqli_connect("localhost","root","","order_food_project");

    function pdo_connect_mysql() {
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