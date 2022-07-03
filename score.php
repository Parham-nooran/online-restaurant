<?php
    require 'checkauthorization.php';
    require 'databaseconnection.php';
    $score = $_POST['score'];
    $id = $_POST['ID'];
    $food_id = $_POST['FoodID'];
    $query = "UPDATE order_food SET Score=$score WHERE ID='$id'";
    mysqli_query($connection, $query);
    $query = "SELECT SUM(Score) AS summation, COUNT(*) AS number_of FROM order_food WHERE FoodID='$food_id'";
    $rows = mysqli_query($connection, $query);
    $row = $rows->fetch_assoc();
    $score = $row['summation'] / $row['number_of'];
    $query = "UPDATE foods SET Score=$score WHERE ID='$food_id'";
    mysqli_query($connection, $query);
    $msg = "Scored successfully!";
    $_SESSION['msg'] = $msg;
    header('Location: ./history.php');
?>