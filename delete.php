<?php
    require 'checkauthorization.php';
    require 'databaseconnection.php';
    if(isset($_POST["submit"])){
        $id = $_POST['ID'];
        $query = "DELETE FROM foods where ID = '$id'";
        mysqli_query($connection, $query);
        $query = "DELETE FROM order_food where FoodID = '$id'";
        mysqli_query($connection, $query);
    }
    header('Location: ./adminpanel.php');
?>

