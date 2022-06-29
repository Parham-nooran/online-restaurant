<?php
    require 'checkauthorization.php';
    require 'databaseconnection.php';
    $food_id = $_POST['foodID'];
    $order_id = $_POST['orderID'];
    $query = "UPDATE foods SET Number=(SELECT Number FROM foods WHERE ID='$food_id')+(SELECT Number FROM order_food WHERE OrderID='$order_id' AND FoodID='$food_id')";
    mysqli_query($connection, $query);
    $query = "DELETE FROM order_food WHERE OrderID='$order_id' AND FoodID='$food_id'";
    mysqli_query($connection, $query);
    $message = "Item removed from cart successfully";
    header("Location: ./cart.php");
?>